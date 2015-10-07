
@extends('main')
<style>
    body{
        text-align: center;
    }
</style>
@section('content')
@if(Session::has('message'))
			<div class="alert alert-success" role="alert">
			{{ Session::get('message') }}
			</div>
		@endif
    <div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title">{{ ucfirst($question->user->username) }} asks:</h2></div>
    <div class="panel-body">
      </h3 > {{ e($question->question) }}</h3>
    </div>
</div>
@if($errors->has())
	<div class="alert alert-danger" role="alert">
	<p>ERRORS</p>
	<ul id="form-errors">
		{{ $errors->first('answer','<li>:message</li>') }}
	</ul>
	</div>
		
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