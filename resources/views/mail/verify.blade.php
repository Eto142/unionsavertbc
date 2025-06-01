<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Union Saver Trust Bank Corporation</title>
    <style>
        /* Reset styles */
        body,
        h1,
        p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 200px;
            height: auto;
        }

        .content {
            margin-bottom: 30px;
        }

        .activation-code {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .security-tips {
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
            color: #888;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{asset('logo.png')}}" alt="Union Saver Trust Bank Corporation Logo">
        </div>
        <div class="content">
            <h1 style="text-align: center; color: #333;">Confirm Your Registration</h1>
            <h2 style="text-align: center; color: #333;">Welcome to Union Saver Trust Bank Corporation</h2>
            <p>Your registration is successful, and you are just a step away from verifying your account.</p>
            <p>Please find your activation code below:</p>
            <p class="activation-code">{{$validToken}}</p>
        </div>
        <div class="security-tips">
            <p><strong>Security Tips:</strong></p>
            <ul>
                <li>Never give your login access to anyone.</li>
                <li>This message is automated; do not reply.</li>
            </ul>
            <p><em>Kind Regards,<br>Union Saver Trust Bank Corporation</em></p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Union Saver Trust Bank Corporation. All Rights Reserved.</p>
            <p><a href="#">Unsubscribe</a></p>
        </div>
    </div>
</body>

</html>
