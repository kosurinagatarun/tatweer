<!-- resources/views/contact.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container"><br><br>
        <h1>Contact Us</h1>
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="service_type">Service Type:</label>
                <select id="service_type" name="service_type[]" class="form-control" multiple required>
                    <option value="Website Development">Website Development</option>
                    <option value="SEO Services">SEO Services</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <!-- Add other services as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
