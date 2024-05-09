<!DOCTYPE html>
<html>
<head>
<style>
     body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #000;
        }

        h1 {
            background-color: #007f5c;
            color: white;
            padding: 15px;
            margin: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        p {
            margin: 10px 0;
            padding: 0 20px;
        }

        .content {
            padding: 20px;
            background-color: #ffffff;
            margin: 20px;
            border-radius: 5px;
        }

        .footer {
            background-color: #007f5c;
            color: white;
            text-align: center;
            padding: 4px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .signature {
            margin-top: 20px;
            text-align: right;
            font-style: italic;
            color: #444;
        }
</style>
</head>
<body>

<h1>{{ $mailData['title'] }}</h1>

<div class="content">
    <p>{{ $mailData['body'] }}</p>

    <p>You are receiving this email as part of the authentication process for A.M. Santos Dental Clinic.</p>
    <p>Please find your One-Time Password (OTP) below:</p>

    <p>{{ $mailData['user']->otp; }}</p>

    <p>Please use this OTP to complete your authentication process. Do not share this OTP with anyone for security reasons.</p>
    <p>If you did not request this OTP, please ignore this email.</p>

    <div class="signature">
        Sincerely,<br>
        The A.M. Santos Dental Clinic
    </div>

</div>

<div class="footer">
    &copy; {{ date('Y') }} A.M. Santos Dental Clinic
</div>

</body>
</html>
