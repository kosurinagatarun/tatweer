<?php
// app/Http/Controllers/WebContactFormController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Log;

class WebContactFormController extends Controller
{
    public function showForm()
    {
        return view('contact-us');
    }

    public function submitForm(Request $request)
    {
        try {
            if ($request->botcheck) {
                return redirect()->route('contact.form')->with('error', 'Spam detected');
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'service_type' => 'required|array',
                'service_type.*' => 'string',
                'message' => 'required|string',
            ]);

            $submission = ContactFormSubmission::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'service_type' => $validated['service_type'],
                'message' => $validated['message'],
            ]);

            // Send email to admin
            Mail::to('nagatarunkosuri@gmail.com')->send(new ContactFormSubmitted($submission));

            return redirect()->route('contact.form')->with('success', 'Your message has been sent.');
        } catch (\Exception $e) {
            Log::error('Form submission error: ' . $e->getMessage());
            return redirect()->route('contact.form')->with('success', 'Your message has been sent.');
        }
    }
}
