<!-- resources/views/emails/contact_form_submitted.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>

<body>
    <h1>New Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $submission->name }}</p>
    <p><strong>Email:</strong> {{ $submission->email }}</p>
    <p><strong>Phone:</strong> {{ $submission->phone }}</p>
    <p><strong>Service Type:</strong> {{ implode(', ', $submission->service_type) }}</p>
    <p><strong>Message:</strong> {{ $submission->message }}</p>
</body>

</html>
