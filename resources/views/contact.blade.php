@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-300">Contact Us</h2>
                <p class="text-gray-600 dark:text-gray-400">Have questions? We're here to help.</p>
            </div>
            <div class="p-4">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-600 dark:text-gray-400">Name</label>
                        <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required
                            autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-600 dark:text-gray-400">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-600 dark:text-gray-400">Phone Number</label>
                        <input type="text" id="phone" name="phone_number" class="form-input mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="service_type" class="block text-gray-600 dark:text-gray-400">Service Type</label>
                        <select id="service_type" name="service_type" class="form-select mt-1 block w-full" required>
                            <option value="">Select Service Type</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Sales Inquiry">Sales Inquiry</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-600 dark:text-gray-400">Message</label>
                        <textarea id="message" name="message" class="form-textarea mt-1 block w-full" rows="6" required></textarea>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
