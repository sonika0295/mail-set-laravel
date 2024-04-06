<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Your email styles go here */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .verification-code {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Email Verification</h1>
        <p>Hello {{ $formData['name'] }},</p>
        <p>Your email verification code is:</p>
        <div class="verification-code">
            <strong>{{ $formData['verification_code'] }}</strong>
        </div>
        <p>Please use this code to verify your email address.</p>
        <p>If you didn't request this, you can safely ignore this email.</p>
        <p>Thanks,</p>
        <p>Your Website Team</p>
    </div>
</body>

</html>
