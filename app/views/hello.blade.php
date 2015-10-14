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
<link rel="shortcut icon" href="images/favicon.ico">
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		.panel1 {
			height: 678px;
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
		.panel2{
			background-image: url("http://share4change.org/wp-content/uploads/2013/08/howitwork.jpg");
			background-size: 1300px 600px;
			position: absolute;
			top:110%;
			height: 650px;
			width: 1300px;
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
	</style>
</head>
<body>

<div class="navbar navbar-inverse" position="fixed">
		<div>
      <a class="navbar-brand" href="/">
        <img alt="Brand" src="images/logo2.png" width="31" height="35" id="logo">
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
		<img class="branding" alt="Brand" src="images/logo2.png" width="100" height="112" id="logo">
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
</div>
</body>
</html>