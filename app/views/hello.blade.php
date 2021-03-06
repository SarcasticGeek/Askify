
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
			height: 570px;
			width: 100%;
			color: #999;
			background-image: url("images/banner777.jpg");
			background-repeat: no-repeat;
		}
		#panel1container{
			background: rgba(0,0,0,0.6);
			width: 100%;
			height: 560px;
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
			font-size: 40px;
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
    		border-radius:3px;
    		border-color: white;
    		font-family: 'Handlee', cursive;
    		font-weight: bold;
			opacity: 0.85;
		}
		.btnn:hover
		{
			background-color: white;
			opacity: 1;
		}
		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 40%;
			margin-left: -150px;
			margin-top: -100px;
			text-align: center;
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
			background-color: white;
			border-color: white;
			border-radius: 0px;
			height: 70px;
		}
		.panel2{
			position: relative;
			height: 670px;
			width: 100%;
			top: 60px;
			background-color: white;
			padding-top: 70px;
		}
		#contact-bg{
			position: relative;
			top: -84px;
			height: 670px;
			width: 100%;
			background: rgba(255,255,255,0.8);
		}
		#panel-3{
			background: url("images/banner_img3.jpg");
			background-size: 100% 100%;
			top: 60px !important;
		}
		#panel-3p{
			position: relative;
			top: 120px;
			font-size: 20px;
			color: white;
			font-size: 20px;
			text-align: center;
			width: 50%;
			margin: 0 auto;
			background-color:rgba(0,0,0,0.6);

		}
		#panel-3 p{
			font-weight: 200;
			font-size: 30px;
			padding: 5px;
		}
		#panel-3 h1{
			text-align: center;
			font-size: 60px;
			color: white;
			font-weight: 400px;
			padding-bottom: 20px;
			padding-top: 10px;
		}
		
		#panel-4{
			background: url("images/Mait2.jpg");
			background-size: cover;
			background-position: center;
			position: relative;
			top:60px;
		}

		#contact-left{
			width: 40%;
			margin-left: 30px;
			margin-right: 30px;
			font-size: 20px;
			margin-top: 140px;
			float: left;
		}
		#contact-left label{
			font-size: 20px;
			color: #337ab7;
		}

		#contact-left input{
			font-size: 20px;
		}

		#contact-right{
			margin-right: 30px;
			margin-left: 30px;
			font-size: 20px;
			margin-top: 150px;
			width: 40%;
			float: right;
		}
		#contact-right label{
			font-size: 20px;
			color:#337ab7;
		}
		#contact-right textarea{
			font-size: 20px;
			width: 100%;
			height: 250px;
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
		#submit-signin{
			margin-right:25px;
			background: green;
		}
		#cancel{
			background: red;
		}
		#signup{
			display: inline;
		}
		#signup-signin{
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
		#right-signin{
			width: 35%;
			background: #3b5998;
			display: inline;
			position: absolute;
			left: 60%;
			bottom: 50%;
		}
		#right-1{
			width: 35%;
			background: #DD4b39;
			display: inline;
			position: absolute;
			left: 60%;
			bottom: 25%;
		}
		#right-1-signin{
			width: 35%;
			background: #DD4b39;
			display: inline;
			position: absolute;
			left: 60%;
			bottom: 15%;
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
		#label-password-signin{
			background-image: url("https://codyhouse.co/demo/login-signup-modal-window/img/cd-icon-password.svg");
			background-repeat: no-repeat;    
    		height: 100px;
    		width: 100%; /* may not be necessary */
    		position: absolute;
    		top: 66px;
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

		footer{
			display: block;
			background-color: black;
			color: white;
			width: 100%;
			position: relative;
			bottom: -60px;
		}
		
		/*responsive issues*/
		 @media (max-width: 500px){
		 	.panel1{
				height: 800px;
				width: 500px;
				background-size: cover;
		 	}

		 	.welcome{
		 		left: 240px;
		 		top:300px;
		 		height: 100px;
		 		width: 150px;
		 	}
		 	.welcome .branding{
		 		height: 56px;
		 		width: 50px;
		 	}
		 	h1{
		 		font-size: 20px; 
		 	}
		 	.panel1 .btnn{
		 		height:25px;
		 		width: 100px;
		 		font-size: 10px;
		 		text-align: center;
		 		padding: 0px;
		 		padding-bottom: 25px;
		 	}
		 	.navbar-inverse #logo{
		 		height: 22px;
		 		width: 19px;
		 		vertical-align: middle !important;
		 		margin-top: 30px !important;
		 	}
		 	.navbar-inverse .askify{
		 		font-size: 12px;
		 		left:40px;
		 	}
		 	.navbar-inverse .btnnn
		 	{
		 		position: relative;
		 		top:-5px;
		 		height: 12px;
		 		width: 50px;
		 		font-size: 10px;
		 		text-align: center;
		 		padding: 0px;
		 		padding-bottom: 25px;
		 	}
		 	.navbar-inverse .asking{
		 		display: none;
		 	}
		 	.panel2{
				height: 800px;
				width: 500px;
		 	}
		 	.steps{
		 		width: 500px;
		 	}
		 	.panel2 .step1 , .panel2 .step2 , .panel2 .step3 , .panel2 .step4{
		 		opacity: 1;
		 	}
		 	.step2{
				position: relative;
				top: 50px;
				left:80px;
		 	}
		 	.step3{
				position: relative;
				top: 100px;
				left:80px;
		 	}
		 	.step4{
				position: relative;
				top: 150px;
				left:80px;
		 	}
		 	.big{
				height: 1600px;
				width: 500px;
		 	}
		 }

	</style>


</head>
<body id="body">
<div class="big">
	<div class="navbar navbar-inverse" position="fixed">
		   <div id="rightnav">
      	<ul style="width:50%;float:right;margin-right:60px;font-size:20px;margin-top:5px;">
      		<li id="linav"style="display:inline;padding:20px;float:right;"><a href="#panel-4" class="page-scroll">Contact</a></li>
      		<li style="display:inline;padding:20px;float:right;"><a href="#panel-3" class="page-scroll">About</a></li>
      		<li style="display:inline;padding:20px;float:right;"><a href="#panel-2" class="page-scroll">How It Works</a></li>
      		<li style="display:inline;padding:20px;float:right;"><a href="#panel-1" class="page-scroll">Home</a></li>
      	</ul>
      </div>
		<div>
      <a class="navbar-brand" href="/" style="vertical-align:middle;margin-top:10px;">
        <img alt="Brand" src="images/blue-01.png" width="31" height="35" id="logo">
      </a>
		</div>
    </div>


  <div class="panel1" id="panel-1">
  	<div id="panel1container">
	<div class="welcome">
		<img class="branding" alt="Brand" src="images/blue-01.png" width="100" height="112" id="logo">
	</br>
		<h1 class="head">ASK, and you will get an answer</h1>
	</br>
		<button type="button" class ="btnn" data-toggle="modal" data-target="#myModal">Join Now!</button><br><br>
		<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signin" style="color:#00BFFF">Already Have Account? Sign In Now!</a>
		@yield('content')
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
      	<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signin" style="float:left;margin-top:15px;">Already Have Account? Sign In Now!</a>
        <button type="button" data-dismiss="modal" class="btn btn-danger" id="danger">Close</button>
        <input type="submit" value="Sign Up" class="btn btn-success" style="margin-right:15px;" id="submit" onclick="check()" data-loading-text="Creating Account...">
       
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
        <h4 class="modal-title" style="font-size:25px;"><strong>Sign in!</strong></h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{action('LoginController@doLogin')}}" id="signup-signin" url="login">
        	<label id="label-username" for="username-signin"></label>
        	<input type="text" name="username-signin" required placeholder="Username" class="input-form" id="username-signin">
        	<label for="password-signin" id="label-password-signin"></label>
        	<input type="password" name="password-signin" placeholder="Password" class="input-form" required id="password-signin">
        	<h4 id="center">OR</h4>

        	 <a class="btn btn-block btn-social btn-facebook" id="right-signin" href="facebookauth">
   			 <i class="fa fa-facebook"></i> Sign in with Facebook
 			 </a>
 			<a class="btn btn-block btn-social btn-google" id="right-1-signin" href="auth/ViaGoogle">
   			 <i class="fa fa-google"></i> Sign in with Google Plus
 			 </a>
             </div>
      <div class="modal-footer">
      	<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#myModal" style="float:left;margin-top:15px;">Don't Have Account? Sign Up Now!</a>
        <button type="button" data-dismiss="modal" class="btn btn-danger" id="danger">Close</button>
        <input type="submit" value="Sign In" class="btn btn-success" style="margin-right:15px;" id="submit-signin">
       
       </form>
      </div>
     
    </div>

  </div>
  </div>
</div>

	<div class="panel2" id="panel-2">
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

	<div class="panel2" id="panel-3">
		<div id="panel-3p">
			<h1>
				Who Are We ?
			</h1>
		<p>We Are Undergraduate CSE Students, Ain Shams University. We Decided To Do Something For Our College Before Getting Graduated Under The Supervision Of Dr Bassem Amin.</p>
		</div>
	</div>

	<div class="panel2" id="panel-4">
		<div id="contact-bg">
			<form method="post" action="{{action('HomeController@contact')}}" url="/contact">
				<div id="contact-left">
					<label for="fname">First Name:</label><br>
					<input type="text" name="fname" required> <br><br><br>
					<label for="lname">Last Name:</label><br>
					<input type="text" name="lname" required><br><br><br>
					<label for="email">Email Address:</label><br>
					<input type="email" name="email" required>
				</div>

				<div id="contact-right">
					<label for="message">Your Message:</label><br>
					<textarea rows="6" cols="50" required name="message"></textarea><br><br>
					<input type="submit" value="Send" class="btn btn-success" style="width:250px;">

				</div>
			</form>
			</div>	
	</div>


	<footer class="section section-primary" >
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>© Copyright <?php echo date('Y');?></p>
          </div>
          <div class="col-sm-6">
            <p class="text-info text-right">
              <br>
              <br>
            </p>
            <div class="row">
              <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 hidden-xs text-right">
                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
</div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">

	$(window).scroll(function()
	{
		if($('.big').scrollTop() >=  $('.panel1').offset().top)
		{
			if ($(this).width() > 500) {
				$('.step1').delay(500).animate({left:"160px",opacity:1},1800);
				$('.step2').delay(600).animate({left:"430px",opacity:1},1000);
				$('.step3').delay(700).animate({left:"700px",opacity:1},1300);
				$('.step4').delay(800).animate({left:"970px",opacity:1},1700);
			}
		}
		$(document).ready(function() {
   			$(window).resize();
		});
	});
</script>


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
		$.post('{{url()}}/hello',{data:data},function(output){
			if(output==data){
				username.setCustomValidity('This Username Exists, Please Choose Another Username :)');
				$('#submit').click();
				$('#username').keydown(function(){
				username.setCustomValidity('');
				});
			}
		});
	}
});

	$('#email').blur(function(){
		var data1 = $('input[name=email]').val();
		var email1 = document.getElementById("email");
		if(data1!=""){
			$.post('{{url()}}/hell',{data1:data1},function(output1){
				if(output1=='NO'){
					email1.setCustomValidity('This Email Already Exists, Please Choose Another Email');
					$('#submit').click();
					$('#email').keydown(function(){
						email1.setCustomValidity('');
					});
				}
			});
		}
	});
});
</script>


<script type="text/javascript">
$(document).ready(function(){
	var flag =0;
	$('#signup-signin').submit(function(event){
		event.preventDefault();
		flag++;
		var user = $('input[name=username-signin]').val();
		var pass = $('input[name=password-signin]').val();
		if(user!=""&&pass!=""){
			$.post('{{url()}}/helloo',{user:user,pass:pass},function(output){
				console.log(output);
				if(output=='Activated'){
					var username1 = document.getElementById("username-signin");
					username1.setCustomValidity('');
					window.location.replace("{{url()}}//home");
				}else if(output=='Error'){
					var username1 = document.getElementById("username-signin");
					username1.setCustomValidity('The Username or Password Is Incorrect, Please Focus :/');
					if(flag==1){
						$('#submit-signin').click();
					}
					$('#username-signin').keydown(function(){
					username1.setCustomValidity('');
					flag=0;
					});
					$('#password-signin').keydown(function(){
					username1.setCustomValidity('');
					flag=0;
					});
				}else if(output=='Not'){
					var username1 = document.getElementById("username-signin");
					username1.setCustomValidity("This Account Is Not Activated, Please Visit Your Email To Activate It");
					if(flag==1){
						$('#submit-signin').click();
					}
					$('#username-signin').keydown(function(){
					username1.setCustomValidity('');
					flag=0;
					});
					$('#password-signin').keydown(function(){
					username1.setCustomValidity('');
					flag=0;
					});
				}
			});
		}
	});
});
</script>

    <script type="text/javascript"src=" {{ asset('js/jquery.easing.min.js')}}"></script>
    <script type="text/javascript"src=" {{ asset('js/scrolling-nav.js')}}"></script>
</body>
</html>