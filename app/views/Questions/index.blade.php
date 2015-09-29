@layout('layouts.default')

@section('content')
<div id="ask">
	<h1>Ask a question.</h1>
	@if(Auth::check())

		// ask: Route
		{{ Form::open('ask', 'POST') }}
		{{ Form::token() }}

		// kan fe klam el wlad fl videos katbo hna bycheck beh 3ala errors
		// msh fhma lzmto a, aw by check 3la errors a asln

		<p>
			{{ Form::label('question','Question') }}<br />
			{{ Form::text('question', 'Input::old('question') }}

			{{ Form::submit('ASK') }}
		</p>
		{{ Form::close() }}

	@elseif 
		{
			//Login page
			return Redirect::route('Home');
		}
	@endif

</div>

@endsection