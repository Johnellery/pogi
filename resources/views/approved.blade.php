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
            background-color: #26619c;
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
            background-color: #26619c;
            color: white;
            text-align: center;
            padding: 10px;
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

    <p>We are pleased to inform you that your requested appointment
        at our clinic A.M. Santos Dental Clinic has been approved. Your appointment is scheduled for
        {{ Carbon\Carbon::parse($mailData['appointment']->date)->format('F j, Y') }} at
         {{ Carbon\Carbon::parse($mailData['appointment']->time)->format('g:i A') }} with {{ $mailData['doctor']->name }},
          who will be providing {{ $mailData['appointment']->service->name }}.</p>
    <p>Please let us know if this appointment time works for you, or if you need to reschedule. We look forward to seeing you soon for your dental care.</p>

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
