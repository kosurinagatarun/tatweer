<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class ContactFormController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function showContactForm()
    {
        return view('contact');
    }

    /**
     * Submit the contact form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'service_type' => 'required|array', // Change to array
            'message' => 'nullable|string',
        ]);

        // Create a new contact submission
        $submission = new ContactSubmission();
        $submission->name = $request->name;
        $submission->email = $request->email;
        $submission->phone_number = $request->phone_number;
        $submission->service_type = implode(', ', $request->service_type); // Convert array to string
        $submission->message = $request->message;
        $submission->save();

        // Send email notification to admin
        $this->sendEmailNotification($submission);

        return redirect()->route('admin.contact.show')->with('success', 'Your message has been submitted successfully!');
    }

    /**
     * Send email notification to admin.
     *
     * @param  \App\Models\ContactSubmission  $submission
     * @return void
     */
    private function sendEmailNotification(ContactSubmission $submission)
    {
        // You need to define your admin email address in the .env file
        $adminEmail = env('ADMIN_EMAIL');

        // Send email notification
        Mail::to($adminEmail)->send(new ContactFormSubmitted($submission));
    }

    /**
     * Display the submissions in the admin panel.
     *
     * @return \Illuminate\View\View
     */
    public function viewSubmissions()
    {
        $submissions = ContactSubmission::latest()->paginate(10);
        return view('admin.submissions', compact('submissions'));
    }
}
