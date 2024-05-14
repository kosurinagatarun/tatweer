<?php
// app/Mail/ContactFormSubmitted.php

namespace App\Mail;

use App\Models\ContactFormSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;

    public function __construct(ContactFormSubmission $submission)
    {
        $this->submission = $submission;
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission')
            ->view('emails.contact_form_submitted');
    }
}

