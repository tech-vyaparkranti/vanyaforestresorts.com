<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Quote</title>
</head>
<body>
    <h1>Enquiry Quote Details</h1>
    <p><strong>Check-in Date:</strong> {{ $enquiry->checkin_date }}</p>
    <p><strong>Check-out Date:</strong> {{ $enquiry->checkout_date }}</p>
    <p><strong>Number of Guests:</strong> {{ $enquiry->no_of_guests }}</p>
    <p><strong>Mobile Number:</strong> {{ $enquiry->mobile }}</p>
</body>
</html>
