<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css"href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"href="css/bootstrap.css">
<link rel="stylesheet" type="text/css"href="css/main.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
@section('header')

@show

</head>
<body>
		<!-- header section -->
  <div class="container">
      <div class="row">
          	<nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="#">
                  <img alt="Brand" src="images/logo2.png" width="31" height="35" id="logo">
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li >{{ HTML::linkRoute('others_questions', 'Home') }}</li>
                @if(Auth::User()->iFadmin != 1)
                <li>{{ HTML::linkRoute('your_questions', 'Your Questions') }}</li>
                @endif
               
              </ul>
              {{ Form::open( array('url'=> 'search', 'class'=>'navbar-form navbar-left' ))}}

                {{ Form::token() }}

                {{ Form::text('keyword', 'Search', array('id'=>'keyword' ,'class'=>'form-control')) }}

                {{ Form::submit('Find',array('class'=>'btn btn-default' )) }}

                {{ Form::close() }}
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
                  echo Auth::user()->username;
                  ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                   

                    <li><a href="/edit">Edit</a></li>
                    <li><a href="/logout">Logout</a></li>


                    
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
    </nav>

        </div>
      @yield('content')



      </div>
    <footer class="section section-primary" id="footer">
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



	<!-- footer section -->  
</body>
</html>
