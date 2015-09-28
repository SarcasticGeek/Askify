<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css"href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"href="css/bootstrap.css">



<!-- Latest compiled and minified JavaScript -->
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
  <div class="container-fluid">
  	<a href="login">
  	  	  	<button type="button" class="btnnn">Sign In</button>
  	</a>
  	<p>Have an Account ? </p>
    <div class="navbar-header">

      <a class="navbar-brand" href="/">
        <img alt="Brand" src="images/logo1.jpg" id="logo">
      </a>
    </div>
  </div>
	<div class="welcome">
		<h1>Ask And Answer</h1>
	</br>
	<a href="register">
		<button type="button" class ="btnn">Join Now!</button>
	</a>
		
		@yield('content')
	</div>
</body>
</html>
