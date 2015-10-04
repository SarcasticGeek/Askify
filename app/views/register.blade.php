<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
</style>

<style>
	form
	{
		margin-top: 10px;
	}
</style>
@section('content')
<style>

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
		
		.btnnn {
    		background: #4183D7;
   			color: #fff;
   			font-family: !important;
   			line-height: 25px;
    		text-align: center;
    		border-radius:0px;
    		border: 0 none;
		}

	</style>

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

<div class="registermsg">
<h1>Welcome To Askify</h1>
<h2>Please Sign-Up Here</h2>
</br>
</br>
</div>

<div class="registerform">
	{{Form::open(array('url'=>'register'))}}
	{{Form::text('username','',
	array('placeholder'=>'Username','class'=>'laravelform'))}}
	<?php
	echo $errors->first('username','<p id="error-login">This Field is Required</p>');
	?>
</br>
</br>
{{Form::text('email','',
	array('placeholder'=>'Email Address','class'=>'laravelform'))}}
	<?php
	echo $errors->first('email','<p id="error-login">Email field Incorrect* </p>');
	?>
</br>
</br>
	{{Form::password('password',array('placeholder'=>'Password','class'=>'laravelform'))}}
	<?php
	echo $errors->first('password','<p id="error-login">This Field is Required</p>');
	?>
</br>
</br>
{{Form::password('conpassword',array('placeholder'=>'Confirm Password','class'=>'laravelform'))}}
	<?php
	echo $errors->first('conpassword','<p id="error-login">This Field is Required</p>');
	?>
</br>
@if($alert = Session::get('signuperror'))
<span id="signup-error">
		{{$alert}}
		</span>
	@endif
</br>
</br>
</br>
	{{Form::submit('Sign Up',array('class'=>'submitform'))}}
</br>


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
