<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Askify</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css"href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
			background-image: url("images/background1.jpg");
			background-size: cover;
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
		.head{
			font-family: Proxima Nova Light;
		}

		.btnn {
    		background: #4183D7;
   			color: #fff;
   			font-family: !important;
   			font-size: 30px;
   			line-height: 25px;
    		height: 50px;
   			width: 200px;
    		text-align: center;
    		border-radius:0px;
    		border: 0 none;
		}
		.btnnn {
    		background: #4183D7;
   			color: #fff;
   			font-family: !important;
   			line-height: 25px;
    		text-align: center;
    		border-radius:0px;
    		border: 0 none;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			color: white;
			margin: 16px 0 0 0;
		}

	</style>
</head>
<body>
  
    <div class="navbar navbar-inverse">

      <a class="navbar-brand" href="/">
        <img alt="Brand" src="images/logo2.png" width="31" height="35" id="logo">
      </a>

      <div class="container-fluid">
  	<a href="login">
  	  	  	<button type="button" class="btnnn">Sign In</button>
  	</a>
  	<p>Have an Account ? </p>
 	 </div>
    </div>
	<div class="welcome">
		<h1 class="head">Ask And Answer</h1>
	</br>
	<a href="register">
		<button type="button" class ="btnn">Join Now!</button>
	</a>
		@yield('content')
	</div>
</body>
</html>