<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\ContactService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function __construct(
        private ContactService $contactService
    ) {}

    public function showForm()
    {
        return view('frontend.contact');
    }

    public function submit(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'phone' => ['nullable', 'string', 'max:20'],
                'subject' => ['nullable', 'string', 'max:255'],
                'message' => ['required', 'string'],
                'recaptcha_token' => ['required', 'string'],
                'website' => ['nullable', 'string'],
            ]);

            $this->contactService->submitEnquiry($validated);
            return redirect()
                ->route('contact.show')
                ->with('success', 'Thank you for contacting us! We will get back to you within 24 hours.');

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Please correct the errors below.');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }
}
