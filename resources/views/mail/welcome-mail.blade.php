<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $request['subject'] }}</title>
</head>
<body>
    <h3>Hello Admin</h3>

    <p><strong>Name:</strong> {{ $request['name'] }}</p>
    <p><strong>Email:</strong> {{ $request['email'] }}</p>
    <p><strong>Subject:</strong> {{ $request['subject'] }}</p>
    <p><strong>Message:</strong> {{ $request['message'] }}</p>
</body>
</html>