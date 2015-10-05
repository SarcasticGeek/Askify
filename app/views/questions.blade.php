
@section('content')
<div id="ask">
	<h1>Ask a question.</h1>

		{{ Form::open(array('url'=> 'Questions')) }}

		<p>
			{{ Form::label('body',"Body") }} <br />
			{{ Form::text('body')}}

			{{ Form::label('title',"Title") }} <br />
			{{ Form::text('title')}}

			{{ Form::submit("ASK") }}
		</p>
		{{ Form::close() }}
</div>

