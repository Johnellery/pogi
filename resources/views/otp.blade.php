<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A.M. Santos Dental Clinic</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

html,body{
    background: whitesmoke;
    font-family: 'Poppins', sans-serif;
}

::selection{
    color: #fff;
    background: #108960;
}

.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.container .form{
    background: rgb(251, 251, 251);
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.container .form form .form-control{
    height: 40px;
    font-size: 15px;
    border-color: #4169e1;
    box-shadow: none;
}

.container .form form .form-control:focus{
    border-color: #0000cd;
    box-shadow: 0 0 0 0.2rem rgba(0, 0, 205, 0.25);
}

.container .form form .forget-pass{
    margin: -15px 0 15px 0;
}

.container .form form .forget-pass a{
    font-size: 15px;
}

.container .form form .button{
    background: #4169e1;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.container .form form .button:hover{
    background: #26619c;
}

.container .form form .link{
    padding: 5px 0;
}

.container .form form .link a{
    color: #6665ee;
}

.container .login-form form p{
    font-size: 14px;
}

.container .row .alert{
    font-size: 14px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form method="POST" action="{{ route('verify-otp', ['userId' => $userId]) }}" autocomplete="off">
                    @csrf
                    <h2 class="text-center">OTP CODE VERIFICATION</h2>

                    <!-- Display errors if there are any -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Display success message if there is one -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Countdown timer for OTP expiration -->
                    <div id="countdown" class="text-center text-danger"></div>

                    <div class="form-group">
                        <label></label>
                        <input class="form-control" type="number" name="otp" placeholder="Enter your 6 Digits Code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
                <!-- Resend Code -->
                <div class="resend-code text-center">
                    <a href="{{ route('otp.resend', ['userId' => $userId]) }}">Resend Code?</a>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        // Get the expiration time of the OTP
        let expired = "{{ Carbon\Carbon::parse($userId->expired)->format('Y-m-d H:i:s') }}";


        // Update the countdown every second
        let x = setInterval(function() {
            // Get the current date and time
            let now = new Date().getTime();

            // Calculate the distance between now and the expiration time
            let distance = new Date(expired) - now;

            // Calculate minutes and seconds
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown timer
            document.getElementById("countdown").innerHTML = "OTP expires in: " + minutes + "m " + seconds + "s ";

            // If the countdown is over, display expired message and disable the input field
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "OTP expired!";
                document.querySelector('input[name="otp"]').disabled = true;
            }
        }, 1000);
    </script> --}}
</body>

</html>
