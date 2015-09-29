<!DOCTYPE html> //After logging in
<html>
<head>
	<title>{{ $tilte }}</tilte> 
	{{ HTML::style('/css/main.css') }}
</head>

<body>
	<div id="container">
		<div id="header">
			{{ HTML::link('/', 'Askify') }} // display the name of the web app
		</div>

		<div id="nav">
			<ul>
				<li>{{ HTML::link('/', 'Log Out') }}</li>
			</ul>
		</div>

		<div id="content">
			//check for flash messages we n3mllaha display?? y3ni a?
			// if(Session::has('message'))

			@yield('content')
		</div>
		<div id="footer">
			$Copy: Askify {{ date('Y') }}
		</div>
	</div>
</body>
</html>