
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Askify</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
<link rel="stylesheet" type="text/css"href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"href="css/bootstrap.css">
<link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
			padding: 0!important;
		}
		.modal-dialog{
			width: 100%;
			padding-left: 20px;
		}
		.modal{
			width: 60%;
			background: rgba(0,0,0,0);
			box-shadow: 0 0 0 0;
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
			position: absolute;
			top:110%;
			height: 650px;
			width: 1300px;
		}
		.step1{
			position: absolute;
			opacity: 1;
			top:15%;
			left:2%;
			animation-name:go1;
			animation-duration:1s;
			animation-timing-function: ease-in-out;
		}

		@keyframes go1{
    		0%{
    			left:0%;
    			opacity: 0;}
    		100%{
    			left:2%;
    			opacity: 1;}		
		}


		.step2{
			position: absolute;
			left:25%;
    		top:30%;
			animation-name:go2;
			animation-duration:1.5s;
			animation-timing-function: ease-in-out;
		}

		@keyframes go2{
    		0%{
    			left:8%;
    			opacity: 0;
    		}
    		100%{
    			left:25%;
    			opacity: 1;
    		}		
		}


		.step3{
			position: absolute;
			opacity: 1;
			top:45%;
			left:50%;
			animation-name:go3;
			animation-duration:1.8s;
			animation-timing-function: ease-in-out;
		}

		@keyframes go3{
    		0%{
    			left:25%;
    			opacity: 0;}
    		100%{
    			left:50%;
    			opacity: 1;}		
		}


		.step4{
			position: absolute;
			opacity: 1;
			top:60%;
			left:75%;
			animation-name:go4;
			animation-duration:2s;
			animation-timing-function: ease-in-out;
		}

		@keyframes go4{
    		0%{
    			left:50%;
    			opacity: 0;}
    		100%{
    			left:75%;
    			opacity: 1;}		
		}

		body.modal-open {
 		 overflow: inherit;
  		 padding-right: 0 !important;
		}
		.input-form{
			font-size: 20px !important;
			display: block;
			width: 40% !important;
			margin-left: 25px !important;
		}
		#submit{
			margin-right:25px;
			background: green;
		}
		#cancel{
			background: red;
		}
		#signup{
			display: inline;
		}
		#right{
			width: 35%;
			background: #3b5998;
			display: inline;
			position: absolute;
			left: 60%;
			bottom: 60%;
		}
		#right-1{
			width: 35%;
			background: #DD4b39;
			display: inline;
			position: absolute;
			left: 60%;
			bottom: 25%;
		}
		#left{
			display: inline;
		}
		#center{
			display: inline;
			position: absolute;
			left: 48%;
			bottom: 40%;
		}
		#danger{
			background-color: #c9302c;
		}
		#label-username{
			background-image: url("https://codyhouse.co/demo/login-signup-modal-window/img/cd-icon-username.svg");
			background-repeat: no-repeat;    
    		height: 100px;
    		width: 100%; /* may not be necessary */
    		position: absolute;
    		top: 19px;
    		width: 30px;

		}
		#label-email{
			background-image: url("https://codyhouse.co/demo/login-signup-modal-window/img/cd-icon-email.svg");
			background-repeat: no-repeat;    
    		height: 100px;
    		width: 100%; /* may not be necessary */
    		position: absolute;
    		top: 65px;
    		width: 30px;
		}
		#label-password{
			background-image: url("https://codyhouse.co/demo/login-signup-modal-window/img/cd-icon-password.svg");
			background-repeat: no-repeat;    
    		height: 100px;
    		width: 100%; /* may not be necessary */
    		position: absolute;
    		top: 113px;
    		width: 30px;
		}
		#label-password-con{
			background-image: url("https://codyhouse.co/demo/login-signup-modal-window/img/cd-icon-password.svg");
			background-repeat: no-repeat;    
    		height: 100px;
    		width: 100%; /* may not be necessary */
    		position: absolute;
    		top: 160px;
    		width: 30px;
		}

	</style>


</head>
<body id="body">

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
		<button type="button" class ="btnn" data-toggle="modal" data-target="#myModal">Join Now!</button>
		@yield('content')
	</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size:25px;"><strong>Sign Up!</strong></h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{action('RegisterController@doRegister')}}" id="signup">
        	<label id="label-username" for="username"></label>
        	<input type="text" name="username" required placeholder="Username" class="input-form" id="username">
        	<label id="label-email" for="email"></label>
        	<input type="email" name="email" placeholder="Email Address" class="input-form" required id="email">
        	<label for="password" id="label-password"></label>
        	<input type="password" name="password" placeholder="Password" class="input-form" required id="password">
        	<label for="password" id="label-password-con"></label>
        	<input type="password" name="conpassword" placeholder="Password Confirmation" class="input-form" required id="conpassword">
        	<h4 id="center">OR</h4>

        	 <a class="btn btn-block btn-social btn-facebook" id="right" href="facebookauth">
   			 <i class="fa fa-facebook"></i> Sign in with Facebook
 			 </a>
 			<a class="btn btn-block btn-social btn-google" id="right-1" href="auth/ViaGoogle">
   			 <i class="fa fa-google"></i> Sign in with Google Plus
 			 </a>
             </div>
      <div class="modal-footer">
      	<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signin" style="float:left;margin-top:15px;">Already Have Account?</a>
        <button type="button" data-dismiss="modal" class="btn btn-danger" id="danger">Close</button>
        <input type="submit" value="Submit" class="btn btn-success" style="margin-right:15px;" id="submit" onclick="check()" data-loading-text="Creating Account...">
       
       </form>
      </div>
    </div>

  </div>
</div>

<div id="signin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
      	<a href="#" data-toggle="modal" data-target="#signin">Already Has Account?</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="panel2">
	<div>
		<img class="step1" alt="Brand" src="images/step1.png" width="200" height="200" id="logo">
	</div>
	<div>
		<img class="step2" alt="Brand" src="images/step2.png" width="200" height="200" id="logo">
	</div>
	<div>
		<img class="step3" alt="Brand" src="images/step3.png" width="200" height="200" id="logo">
	</div>
	<div>
		<img class="step4" alt="Brand" src="images/step4.png" width="200" height="200" id="logo">
	</div>
</div>

<script type="text/javascript">
	function check(){
	var password = document.getElementById("password");
	var conpassword = document.getElementById("conpassword");
	if(password.value!==conpassword.value){
	conpassword.setCustomValidity("Passwords Don't Match");
}else{
	conpassword.setCustomValidity('');
}
		$('#conpassword').keydown(function(){
			conpassword.setCustomValidity('');
		});

	}
</script>

<script type="text/javascript">
$(document).ready(function(){
$('#username').blur(function(){
	var data = $('input[name=username]').val();
	var username = document.getElementById("username");
	if(data!=""){
		$.post('/hello',{data:data},function(output){
			if(output==data){
				username.setCustomValidity('This Username Exists, Please Choose Another Username :)');
				$('#submit').click();
			}
		});
	}
});
$('#username').keydown(function(){
		username.setCustomValidity('');
	});
});


</script>


</body>
</html>