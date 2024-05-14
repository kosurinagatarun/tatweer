<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CounterController;
// routes/web.php


use App\Http\Controllers\WebContactFormController;
use App\Http\Controllers\Admin\ContactFormController as AdminContactFormController;

use Illuminate\Support\Facades\Mail;

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email', function ($message) {
            $message->to('nagatarunkosuri@gmail.com')
                ->subject('Test Email');
        });
        return 'Email sent successfully';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/contact-us', [WebContactFormController::class, 'showForm'])->name('contact.form');
Route::post('/contact-us', [WebContactFormController::class, 'submitForm'])->name('contact.submit');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/contact-forms', [AdminContactFormController::class, 'index'])->name('contact_forms.index');
    Route::get('/contact-forms/{id}', [AdminContactFormController::class, 'show'])->name('contact_forms.show');
});



// Public Routes
Route::get('/', function () {
    return view('web.index');
});
Route::get('/about', function () {
    return view('web.about');
});
Route::get('/ui_ux', function () {
    return view('web.ui_ux');
});
Route::get('/header', function () {
    return view('layouts.admin');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    // Settings Routes
    Route::prefix('admin/settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('setting');
        Route::get('/edit', [SettingController::class, 'edit'])->name('admin.settings.edit');
        Route::put('/update', [SettingController::class, 'update'])->name('admin.settings.update');
    });

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/counters', [CounterController::class, 'index'])->name('admin.counters.index');
        Route::get('/counters/create', [CounterController::class, 'create'])->name('admin.counters.create');
        Route::post('/counters/store', [CounterController::class, 'store'])->name('admin.counters.store');
        Route::get('/counters/{counter}/edit', [CounterController::class, 'edit'])->name('admin.counters.edit');
        Route::put('/counters/{counter}/update', [CounterController::class, 'update'])->name('admin.counters.update');
        Route::delete('/counters/{counter}/destroy', [CounterController::class, 'destroy'])->name('admin.counters.destroy');
    });







});



// Authentication Routes
require __DIR__ . '/auth.php';
