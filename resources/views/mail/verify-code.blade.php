<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Union Saver Trust Bank Corporation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }
        h1, h2, h3 {
            margin-bottom: 15px;
        }
        p {
            margin-bottom: 10px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{asset('logo.png')}}" alt="Logo" style="display: block; margin: 0 auto;">
        <h1>Welcome to Union Saver Trust Bank Corporation</h1>
        <p>Your registration is successful, and you are just a step away from verifying your account.</p>
        <h2>Activation Code:</h2>
        <p style="font-size: 24px; font-weight: bold;">{{$validToken}}</p>
        <hr>
        <h3>Security Tips:</h3>
        <ul>
            <li>Never give your login access to anyone.</li>
            <li>This message is automated; do not reply.</li>
        </ul>
        <p>Kind Regards,<br>Union Saver Trust Bank Corporation</p>
    </div>
    <div class="footer">
        <p>&copy; 2023 - All Rights Reserved</p>
        <a href="#" class="button">Unsubscribe</a>
    </div>
</body>
</html>
