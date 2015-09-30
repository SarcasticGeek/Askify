@extends ('layouts.default')

@section('content')
<div id="ask">
	<h1>Ask a question.</h1>
	@if(Auth::check())

		{{ Form::open(array('ask'=> 'post')) }}
		{{ Form::token() }}

		<p>
			{{ Form::label('question',"Question") }} <br />
			{{ Form::text('question', Input::old("question")) }}

			{{ Form::submit("ASK") }}
		</p>
		{{ Form::close() }}

	@else
		<p>Please log in first to ask a question!</p>
		
	@endif

</div>

@stop