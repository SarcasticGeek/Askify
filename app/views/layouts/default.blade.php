<!DOCTYPE html>
<html>
<head>
	<title>{{ "Askify - Home" }}</title> 
	{{ HTML::style('main.css') }}
</head>

<body>
	<div id="container">
		<div id="header">
			{{ HTML::link('/', 'Askify') }}
		</div>

		<div id="nav">
			<ul>
				<li>{{ HTML::link('/', 'Log Out') }}</li>
			</ul>
		</div>

		<div id="content">
			@yield('content')
		</div>
		<div id="footer">
			$Copy: Askify {{ date('Y') }}
		</div>
	</div>
</body>
</html>