<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Askify</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css"href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
<link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="shortcut icon" href="images/favicon.ico">
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		.panel1 {
			height: 658px;
			width: 100%;
			margin:0;
			text-align:center;
			color: #999;
			background-image: url("images/background2.jpg");
			background-size: cover;
		}
		body{
			font-family: 'Handlee', cursive;
		}
		.askify
		{
			position: absolute;
			left: 60px;
			top:15px;
			color: white;
			font-size: 20px;	
		}
		.branding
		{
			opacity: 0.85;
		}
		.branding:hover
		{
			opacity: 1;
		}
		.head
		{
			opacity: 0.85;
		}
		.head:hover
		{
			opacity: 1;
		}
		.btnn
		{
			background: none;
   			font-size: 30px;
   			line-height: 25px;
    		height: 50px;
   			width: 200px;
    		text-align: center;	
    		border-radius:0px;
    		border-color: #4183D7;
    		font-family: 'Handlee', cursive;
    		font-weight: bold;
			opacity: 0.85;
		}
		.btnn:hover
		{
			background: none;
			opacity: 1;
		}
		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}
		div.overlay {
    		opacity: .9;
   			background-color: black;
   		}
		.btnnn {
    		background: #4183D7;
   			color: #fff;
   			line-height: 25px;
    		text-align: center;
    		border-radius:0px;
    		border: 0 none;
    		font-family: 'Handlee', cursive;
		}

		h1 {
			font-size: 32px;
			color: white;
			margin: 16px 0 0 0;
		}
		.navbar-inverse
		{
			position: fixed;
			width: 100%;
			z-index: 1;
		}
		.panel2{
			background-size: 1300px 600px;
			position: relative;
			height: 565px;
			width: 1300px;
			top:5%;
		}
		.step1{
			position: relative;
			top:-10px;
			opacity:0;
			left:80px;
			height: 200px;
			width: 200px;
/*			animation-name:go1;
			animation-duration:1s;
			animation-timing-function: ease-in-out;*/
		}

/*		@keyframes go1{
    		0%{
    			left:0%;
    			opacity: 0;}
    		100%{
    			left:2%;
    			opacity: 1;}		
		}*/


		.step2{
			position: relative;
			opacity:0;
			top:-110px;
			left:200px;
			height: 200px;
			width: 200px;
/*			animation-name:go2;
			animation-duration:1.5s;
			animation-timing-function: ease-in-out;*/
		}

/*		@keyframes go2{
    		0%{
    			left:8%;
    			opacity: 0;
    		}
    		100%{
    			left:25%;
    			opacity: 1;
    		}		
		}*/


		.step3{
			height: 200px;
			width: 200px;
			position: relative;
			opacity:0;
			top:-190px;
			left:400px;
/*			animation-name:go3;
			animation-duration:1.8s;
			animation-timing-function: ease-in-out;*/
		}

/*		@keyframes go3{
    		0%{
    			left:25%;
    			opacity: 0;}
    		100%{
    			left:50%;
    			opacity: 1;}		
		}*/


		.step4{
			height: 200px;
			width: 200px;
			position: relative;
			opacity:0;
			top:-250px;
			left:600px;
/*			animation-name:go4;
			animation-duration:2s;
			animation-timing-function: ease-in-out;*/
		}
		.steps
		{
			height: 500px;
			width: 1000px; 
		}

/*		@keyframes go4{
    		0%{
    			left:50%;
    			opacity: 0;}
    		100%{
    			left:75%;
    			opacity: 1;}		
		}*/
		.big{
			height: 1150px;
		}

	</style>
</head>
<body>
<div class="big">
	<div class="navbar navbar-inverse" position="fixed">
		<div>
      <a class="navbar-brand" href="/">
        <img alt="Brand" src="images/blue-01.png" width="31" height="35" id="logo">
      </a>
      <p class="askify">Askify</p>
		</div>
      <div class="container-fluid">
         <!-- <a href="facebookauth">
              <button type="button" class="btnnn">Sign In Using facebook</button></a>
               <a href="auth/ViaGoogle">
              <button type="button" class="btnnn">Sign In Using Google+</button></a>-->
  			<a href="login">
  	  	  		<button type="button" class="btnnn">Sign In</button>
  			</a>
  		<p>Have an Account ? </p>
 	 </div>
    </div>

  	<div class="panel1">
		<div class="welcome">
			<img class="branding" alt="Brand" src="images/blue-01.png" width="100" height="112" id="logo">
		</br>
			<h1 class="head">ASK, and you will get an answer</h1>
		</br>
		<a href="register">
			<button type="button" class ="btnn">Join Now!</button>
		</a>
			@yield('content')
		</div>
	</div>



	<div class="panel2">
		<div class="steps">
			<div  class="step1">
				<img alt="Brand" src="images/step1.png" width="200" height="200" id="logo">
			</div>
			<div  class="step2">
				<img alt="Brand" src="images/step2.png" width="200" height="200" id="logo">
			</div>
			<div class="step3">
				<img  alt="Brand" src="images/step3.png" width="200" height="200" id="logo">
			</div>
			<div class="step4">
				<img  alt="Brand" src="images/step4.png" width="200" height="200" id="logo">
			</div>
		</div>
	</div>
</div>
<script src="js/jquery/js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">

	$(window).scroll(function()
	{
		if($('.big').scrollTop() >=  $('.panel1').offset().top)
		{
			$('.step1').animate({left:"160px",opacity:1},800);
			$('.step2').delay(500).animate({left:"430px",opacity:1},800);
			$('.step3').delay(900).animate({left:"700px",opacity:1},800);
			$('.step4').delay(1300).animate({left:"970px",opacity:1},800);
		}
	});
</script>
</body>
</html>