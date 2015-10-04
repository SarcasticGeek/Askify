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
     <div class="answer">
 	<h1> Edit Your Answer</h1>
 {{Form::open(array('url'=>'answer/update','method'=> 'post'))}}
{{Form::token()}}
{{Form::hidden('question_id',$question->id)}}
{{Form::hidden('answer_id',$answer->id)}}
 	<textarea class="form-control" rows="5" name="answer" style="width:40em; margin-left: auto;
    margin-right: auto; margin-bottom:1em;">{{ $answer->answer }}</textarea>
    {{Form::submit('Edit',array('class'=>'btn btn-success'))}}
	
	{{Form::close()}}
	@if($message = Session::get('message'))
	{{$message}}
	@endif
</div>
@endif

@stop