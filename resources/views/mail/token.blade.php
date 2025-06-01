<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Union TB Transaction Confirmation</title>
    <style>
        /* Reset styles */
        body,
        h1,
        h2,
        h3,
        h4,
        p,
        ul,
        li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Work Sans', sans-serif;
            background-color: #f4f4f4;
            color: #333333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100%;
            height: auto;
        }

        .content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .content h2 {
            margin-bottom: 10px;
            color: #333333;
        }

        .content p {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            color: #888888;
            font-size: 12px;
        }

        .footer a {
            color: #5caad2;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{asset('logo.png')}}" alt="Logo">
        </div>
        <div class="content">
            <h2>Confirm Your Transaction</h2>
            <p>Kindly use the code below to validate your One-Time Code:</p>
            <h3>{{$token}}</h3>
            <p>If you did not request this code, please ignore this email.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 - All Rights Reserved</p>
            <p><a href="#">UNSUBSCRIBE</a></p>
        </div>
    </div>
</body>

</html>
