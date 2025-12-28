<?php

use Illuminate\Support\Facades\Cache;


if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        $cacheKey = 'setting_' . $key;

        return Cache::remember($cacheKey, config('cache.expiry.settings', 86400), function () use ($key, $default) {
            $setting = Setting::where('key', $key)->first();

            if (!$setting) {
                return $default;
            }

            return match($setting->type) {
                'boolean' => (bool) $setting->value,
                'integer' => (int) $setting->value,
                'float' => (float) $setting->value,
                'json' => json_decode($setting->value, true),
                default => $setting->value,
            };
        });
    }
}

if (!function_exists('format_currency')) {
    /**
     * Format currency
     */
    function format_currency($amount, string $currency = 'USD'): string
    {
        return number_format($amount, 2) . ' ' . $currency;
    }
}

if (!function_exists('format_date')) {
    /**
     * Format date
     */
    function format_date($date, string $format = 'Y-m-d'): string
    {
        if (!$date) {
            return '';
        }

        if (is_string($date)) {
            $date = \Carbon\Carbon::parse($date);
        }

        return $date->format($format);
    }
}

if (!function_exists('has_permission')) {
    /**
     * Check if user has permission
     */
    function has_permission(string $permission): bool
    {
        return auth()->check() && auth()->user()->hasPermission($permission);
    }
}

if (!function_exists('has_role')) {
    /**
     * Check if user has role
     */
    function has_role(string $role): bool
    {
        return auth()->check() && auth()->user()->hasRole($role);
    }
}


if (!function_exists('encode_id')) {
    /**
     * Encode integer ID to public ID with prefix
     */
    function encode_id(int $id, string $prefix = 'id', string $connection = 'main'): string
    {
        $encoded = Hashids::connection($connection)->encode($id);
        return $prefix . '_' . $encoded;
    }
}

if (!function_exists('decode_id')) {
    /**
     * Decode public ID to integer ID
     */
    function decode_id(string $publicId, string $connection = 'main'): ?int
    {
        $parts = explode('_', $publicId, 2);

        if (count($parts) !== 2) {
            return null;
        }

        try {
            $decoded = Hashids::connection($connection)->decode($parts[1]);
            return $decoded[0] ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
}

if (!function_exists('is_public_id')) {
    /**
     * Check if string is a public ID format
     */
    function is_public_id(string $value): bool
    {
        return preg_match('/^[a-z]+_[a-zA-Z0-9]+$/', $value) === 1;
    }
}

if (!function_exists('public_id')) {
    /**
     * Generate public ID from model and ID
     */
    function public_id($model, ?int $id = null): string
    {
        if (is_object($model)) {
            return $model->public_id;
        }

        if (is_string($model) && class_exists($model) && $id) {
            $instance = new $model;
            return $instance->encodeId($id);
        }

        return '';
    }
}
