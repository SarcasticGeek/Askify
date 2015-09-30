<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
			background-color: #f9f9f9;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}

		h2 {
			color: #494949;
		}

	</style>

	<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<a href="register">
  	<button type="button" class="btnnn">Sign Up</button>
  </a>
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        <span id="brand">Askify</span>
      </a>
    </div>
  </div>
</nav>

<div class="loginmsg">
<h1>Welcome To Askify</h1>
<h2>Please Log In Here</h2>
</br>
</br>
</div>

<div class="loginform">
	{{Form::open(array('url'=>'login'))}}
	{{Form::text('username',Input::old('username'),
	array('placeholder'=>'Username','class'=>'laravelform'))}}
	<?php
	echo $errors->first('username','<p id="error-login">This Field is Required</p>');
	?>
</br>
</br>
	{{Form::password('password',array('placeholder'=>'Password','class'=>'laravelform'))}}
	<?php
	echo $errors->first('password','<p id="error-login">This Field is Required</p>');
	?>
</br>
</br>
</br>
</br>
	{{Form::submit('Log In',array('class'=>'submitform'))}}
</br>
	<div class="field">
	{{Form::checkbox('remember','Remember Me')}}
	{{Form::label('remember','Remember Me')}}
</br>
</br>
</br>
	<a href="#" id="reset">Forget Your Password ?</a>
	</div>
	{{Form::close()}}
</div>



  <div class="panel-footer">
    <div class="panel-body">
                © 2015 Askify
            </div>
  </div>

	</body>
</head>
</html>