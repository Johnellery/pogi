<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #000; /* Set text color to black */
        }

        h1 {
            background-color: #a9203e;
            color: white;
            padding: 20px;
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
            background-color: #a9203e;
            color: white;
            text-align: center;
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<h1>{{ $mailData['title'] }}</h1>

<div class="content">
    <p>{{ $mailData['body'] }}</p>

    <p>We regret to inform you that your appointment
        at our clinic located at A.M. Santos Dental Clinic has been cancelled. The appointment
        scheduled for {{ Carbon\Carbon::parse($mailData['appointment']->date)->format('F j, Y') }}
        at {{ Carbon\Carbon::parse($mailData['appointment']->time)->format('g:i A') }} with
        {{ $mailData['doctor']->name }} for {{ $mailData['appointment']->service->name }} has been cancelled.</p>
        <p style="color: black;">We apologize for any inconvenience this may cause. Please feel free to contact us if you have any questions or need to reschedule.</p>
    <div class="signature" style="color: black;">
        Sincerely,<br>
        The A.M. Santos Dental Clinic
    </div>
</div>
<div class="footer">
    &copy; {{ date('Y') }} A.M. Santos Dental Clinic
</div>

</body>
</html>
