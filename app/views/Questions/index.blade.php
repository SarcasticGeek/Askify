@layout('layouts.default')

@section('content')
<div id="ask">
	<h1>Ask a question.</h1>
	@if(Auth::check())

		//ask : Route 
		{{ Form::open('ask', 'POST') }}
		{{ Form::token() }}
		<p>
			{{ Form::label('question','Question') }}<br />
			{{ Form::text('question', 'Input::old('question') }}

			{{ Form::submit('ASK') }}
		</p>
		{{ Form::close() }}

	@elseif 
		{
			//Login page
			return Redirect::route('Login');
		}
	@endif

</div>

@endsection