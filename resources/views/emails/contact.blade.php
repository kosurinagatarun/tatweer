<!DOCTYPE html>
<html>

<head>
    <title>New Contact Form Submission</title>
</head>

<body>
    <h2>New Contact Form Submission</h2>
    <p>A new contact form submission has been received:</p>
    <p><strong>Name:</strong> {{ $submission->name }}</p>
    <p><strong>Email:</strong> {{ $submission->email }}</p>
    <p><strong>Phone Number:</strong> {{ $submission->phone }}</p>
    <p><strong>Service Type:</strong> {{ implode(', ', $submission->service) }}</p>
    <p><strong>Message:</strong> {{ $submission->message }}</p>
</body>

</html>
