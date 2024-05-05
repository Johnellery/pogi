<!DOCTYPE html>
<html>
<head>
    <title>About Us Section</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
/* *{
	margin:0px;
	padding:0px;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
} */
body {

    margin:0px;
	padding:0px;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}
.section{
    border-radius: 10px;
	min-height: 100vh;
	background-color: #ddd;
}
.container{
	width: 80%;
	/* display: block; */
	margin:auto;
	padding-top: 100px;
}
.image-section{
	float: right;
	width: 40%;
	height: calc(auto - 15px);
}
.image-section img{
	width: 100%;
	border-radius: 10px;
	height: 320px;
}
.content-section {
	float: left;
	width: 60%;
	padding-right: 20px;
}
.content-section .title {
	text-transform: uppercase;
	font-size: 28px;
	color: #333;
	margin-bottom: 20px;
}

.content-section .content {
	background: #fff;
	border-radius: 10px;
	padding: 20px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.content-section .content h3 {
	margin-top: 0;
	color: #333;
	font-size: 24px;
}

.content-section .content p {
	margin-top: 10px;
	font-family: 'Poppins', sans-serif;
	font-size: 16px;
	color: #666;
	line-height: 1.6;
}

.content-section .content a {
	color: #007bff;
	text-decoration: none;
}

.content-section .content a:hover {
	text-decoration: underline;
}
.content-section-container {
	float: left;
	width: 100%;
	justify-content: space-around;
	display: flex;
}
.content-section-container .content {
	background: #fff;
	border-radius: 10px;
    width: 90%;
    margin: 1rem;
    padding: 1rem;
	text-align: left;
	text-decoration: none;
	justify-content: space-between;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.content-section-container .content p {
	margin-top: 10px;
	font-family: 'Poppins', sans-serif;
	font-size: 16px;
	color: #666;
	line-height: 1.6;
}
.content-section-container .content h3 {
	margin-top: 0;
	color: #333;
	font-size: 24px;
	text-align: center;
}


@media screen and (max-width: 768px){
	.container{
	width: 80%;
	display: block;
	margin:auto;
	padding-top:50px;
}
.content-section{
	float:none;
	width:100%;
	display: block;
	margin:auto;
}
.content-section-container{
	float:none;
	width:100%;
	margin: 1rem;
    padding: 1rem;
	display: block;
	margin:auto;
}
.image-section {
    float: none;
    width: 100%;
}

.image-section img{
	width: 100%;
	height: auto;
	display: block;
	margin:auto;
}
.content-section .title{
	text-align: center;
	font-size: 19px;
}
.content-section .content .button{
	text-align: center;
}
.content-section .content .button a{
	padding:9px 30px;
}
.content-section .social{
	text-align: center;
}

}
    </style>
</head>
<body>
    <div class="section">
        <div class="container">
            <div class="content-section">
                <div class="title">
                    <h1>About Us</h1>
                </div>
                <div class="content">
                    <h3>A.M. Santos Dental Clinic</h3>
                    <p>Facebook page: <a href="https://www.facebook.com/a.m.santosdentalclinic	">A.M. Santos Dental Clinic</a></p>
                    <p>Cellphone Number: <a href="tel:+639187772298">+639187772298</a></p>
                    <p>Location: Rocka Avenue, Rocka Village II, Tabang, Plaridel, Bulacan</p>
                    <p>Google Maps: <a href="https://maps.app.goo.gl7kJH19s3WZj392jh7">View on Google Maps</a></p>
                </div>
            </div>

            <div class="image-section">
                <img src="{{ asset('storage/ok.jpg') }}" alt="Clinic Image" >
                {{-- <img src="image/ok.jpg" alt="Clinic Image"> --}}
            </div>
			<div class="content-section-container">
				<div class="content">
					<h3>Mission</h3>
					<p>Our mission is to surpass patients' expectations by treating them with the utmost care while also developing a trusting relationship with them. Our patients should have faith that they will receive the greatest care dentistry has to offer since we are enthusiastic about what we do.</p>
				</div>
				<div class="content">
					<h3>Vision</h3>
					<p>Our vision is to create a lasting relationship with our patients through dental care that is based on confidence, trust, high-quality work, and outstanding patient care. being the best clinic in terms of getting appointments done in an hour.</p>
				</div>
				<div class="content">
					<h3>Goals</h3>
					<p>Make each patient’s dental experience as comfortable and stress-free as possible. - Treat every patient as if they are a member of our family. - Provide our patients with the best dental care possible using state of the  art  techniques and technology. - To be the top number and dental office in the area.</p>
				</div>
			</div>

    </div>
</body>
</html>
