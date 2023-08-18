<!DOCTYPE html>
<html>
<head>
    <title>Paying Guest</title>
</head>
<body>
    <h1>{{ $mailData['name'] }}</h1>
    <p>{{ $mailData['email'] }}</p>
    <p>{{ $mailData['subject'] }}</p>
    <p>{{ $mailData['phone_number'] }}</p>
    <p>{{ $mailData['message'] }}</p>
    
    <p>Thank you</p>
</body>
</html>