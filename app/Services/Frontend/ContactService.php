<?php

namespace App\Services\Frontend;

use App\Models\ContactEnquiry;
use Carbon\Carbon;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class ContactService
{
    private const MAX_ENQUIRIES_PER_MINUTE = 3;
    private const MAX_ENQUIRIES_PER_HOUR = 100;
    private const SPAM_CACHE_KEY = 'contact_spam_';
    private const DUPLICATE_CACHE_TTL = 3600; // 1 hour
    private const RECAPTCHA_MIN_SCORE = 0.5;

    public function submitEnquiry(array $data): ContactEnquiry
    {
        $ip = $this->getClientIp();
        $email = strtolower($data['email'] ?? '');
        // 1. reCAPTCHA v3 Verification
        $this->verifyRecaptcha($data['recaptcha_token'] ?? '', $ip);
        // 2. Rate Limiting (IP-based)
        $this->checkRateLimit($ip);

        // 3. Honeypot Spam Trap
        $this->checkHoneypot($data);

        // 4. Duplicate Content Check
        $this->checkDuplicateContent($data, $ip, $email);

        // 5. Suspicious Content Filter
        $this->checkSuspiciousContent($data);

        // 6. Same Email/IP Frequency Check
        $this->checkFrequentSubmitter($ip, $email);

        // 7. Data Validation
        $this->validateData($data);

        // 8. Create Enquiry
        $enquiry = ContactEnquiry::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'],
            'status' => 'pending',
            'ip_address' => $ip,
            'user_agent' => $this->getUserAgent(),
        ]);

        // 9. Cache recent submission for duplicate check
        Cache::put(self::SPAM_CACHE_KEY . $ip . '_' . md5($data['message']), true, self::DUPLICATE_CACHE_TTL);

        return $enquiry;
    }

    private function getClientIp(): string
    {
        return request()?->ip() ?? request()->header('X-Forwarded-For') ?? '127.0.0.1';
    }

    private function getUserAgent(): ?string
    {
        return request()?->userAgent();
    }

    private function verifyRecaptcha(string $token, string $ip): void
    {
        if (empty($token)) {
            throw ValidationException::withMessages([
                'recaptcha_token' => 'reCAPTCHA verification required.',
            ]);
        }

        $recaptcha = new Recaptcha(config('app.recaptcha.secret_key'));
        $resp = $recaptcha->verify($token, $ip);

        if (!$resp->isSuccess()) {
            throw ValidationException::withMessages([
                'recaptcha_token' => 'reCAPTCHA verification failed.',
            ]);
        }

        // Block low-confidence scores
        if ($resp->getScore() < self::RECAPTCHA_MIN_SCORE) {
            throw ValidationException::withMessages([
                'recaptcha_token' => 'Verification failed. Please try again.',
            ]);
        }
    }

    private function checkRateLimit(string $ip): void
    {
        $minuteKey = "contact_rate_{$ip}_minute";
        $hourKey = "contact_rate_{$ip}_hour";

        RateLimiter::for($minuteKey, function () use ($ip) {
            return ContactEnquiry::where('ip_address', $ip)
                ->where('created_at', '>=', Carbon::now()->subMinute())
                ->count();
        });

        RateLimiter::for($hourKey, function () use ($ip) {
            return ContactEnquiry::where('ip_address', $ip)
                ->where('created_at', '>=', Carbon::now()->subHour())
                ->count();
        });

        $minuteExceeded = RateLimiter::tooManyAttempts($minuteKey, self::MAX_ENQUIRIES_PER_MINUTE);
        $hourExceeded = RateLimiter::tooManyAttempts($hourKey, self::MAX_ENQUIRIES_PER_HOUR);

        if ($minuteExceeded || $hourExceeded) {
            throw ValidationException::withMessages([
                'email' => 'Too many requests. Please wait before submitting again.',
            ]);
        }
    }

    private function checkHoneypot(array $data): void
    {
        if (!empty($data['website']) && strlen(trim($data['website'])) > 0) {
            throw ValidationException::withMessages([
                'website' => 'Spam bot detected.',
            ]);
        }
    }

    private function checkDuplicateContent(array $data, string $ip, string $email): void
    {
        $cacheKey = self::SPAM_CACHE_KEY . $ip . '_' . md5($data['message']);

        if (Cache::has($cacheKey)) {
            throw ValidationException::withMessages([
                'message' => 'Identical message recently sent. Please wait 1 hour.',
            ]);
        }

        $recentDuplicate = ContactEnquiry::where('email', $email)
            ->where('message', $data['message'])
            ->where('created_at', '>=', Carbon::now()->subHour())
            ->exists();

        if ($recentDuplicate) {
            throw ValidationException::withMessages([
                'message' => 'This exact message was recently sent from this email.',
            ]);
        }
    }

    private function checkSuspiciousContent(array $data): void
    {
        $message = strtolower($data['message'] ?? '');
        $name = strtolower($data['name'] ?? '');

        $suspiciousPatterns = [
            '/viagra|casino|gambling|bitcoin|cryptocurrency|lottery|win.?prize/i',
            '/http[s]?:\/\/|www\./i',
            '/click here|free money|guaranteed|millionaire/i',
            '/[\x00-\x08\x10\x18\x1A\x80-\xFF]/', // Null bytes, control chars
        ];

        foreach ($suspiciousPatterns as $pattern) {
            if (preg_match($pattern, $message) || preg_match($pattern, $name)) {
                throw ValidationException::withMessages([
                    'message' => 'Content appears to be spam.',
                ]);
            }
        }
    }

    private function checkFrequentSubmitter(string $ip, string $email): void
    {
        $recentCount = ContactEnquiry::where(function ($query) use ($ip, $email) {
                $query->where('ip_address', $ip)
                      ->orWhere('email', $email);
            })
            ->where('created_at', '>=', Carbon::now()->subHour())
            ->count();

        if ($recentCount >= 5) {
            throw ValidationException::withMessages([
                'email' => 'Too many submissions from this IP/email in the last hour.',
            ]);
        }
    }

    private function validateData(array $data): void
    {
        $rules = [
            'name' => ['required', 'string', 'between:2,255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^[\+]?[0-9\s\-\(\)\.]+$/'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'between:10,5000'],
            'recaptcha_token' => ['required', 'string', 'min:10'],
            'website' => ['nullable', 'string', 'max:255'], // Honeypot
        ];

        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }
}
