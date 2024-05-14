<?php
// app/Http/Controllers/Admin/ContactFormController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactFormSubmission;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function index()
    {
        $submissions = ContactFormSubmission::paginate(10); // Adjust the number as needed
        return view('admin.contact_forms.index', compact('submissions'));
    }

    public function show($id)
    {
        $submission = ContactFormSubmission::findOrFail($id);
        return view('admin.contact_forms.show', compact('submission'));
    }
}

