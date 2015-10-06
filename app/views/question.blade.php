
@extends('main')
<style>
    body{
        text-align: center;
    }
</style>
@section('content')
@if(Session::has('message'))
			<p id="message">{{ Session::get('message') }}</p>
		@endif
    <h1>{{ ucfirst($question->user->username) }} asks:</h1>
    <p>
        {{ e($question->question) }}
    </p>

@if($errors->has())
	<p>ERRORS</p>
	<ul id="form-errors">
		{{ $errors->first('answer','<li>:message</li>') }}
		</ul>
		
@endif
@if(Auth::check())
	@if(Auth::User()->iFadmin == 1)
	     <div class="answer">
	 	<h1> Put your Answer here!</h1>
	 {{Form::open(array('url'=>'answer','method'=> 'post'))}}
	{{Form::token()}}
	{{Form::hidden('question_id',$question->id)}}
	 	<textarea class="form-control" rows="5" name="answer" style="width:40em; margin-left: auto;
	    margin-right: auto; margin-bottom:1em;"></textarea>
	    {{Form::submit('Answer',array('class'=>'btn btn-success'))}}
		
		{{Form::close()}}
		@if($message = Session::get('message'))
		{{$message}}
		@endif
	</div>
	@endif
@else 
<p>Please Login</p>
@endif
	<div id="answers">
	<h2>Answers</h2>
	@if(count($question->answers)==0)
		<p>No Answrer</p>
	@else
	<ul>
		@foreach($question->answers as $answer)
		<li>{{ e($answer->answer) }}  
		-- updated at : {{ date('h:i A d/m/Y',strtotime($answer->updated_at)) }}

		@if(Auth::check())
			@if($answer->user_id === Auth::User()->id)
			-- {{ HTML::linkRoute('edit_answer','Edit my Answer',$answer->id) }}
			@endif
		@endif	
		</li>
		@endforeach
	</ul>
	@endif	
	</div>
@stop