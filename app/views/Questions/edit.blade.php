
@extends('main')
<style>
	body{
		text-align: center;
	}
	.questionlist{
		text-align: left;
	}
</style>
@section('content')
 <div class="question">
 	<h1> Edit your question here!</h1>
 {{Form::open(array('url'=>'question/update'))}}
 {{Form::token()}}
 {{ Form::hidden('question_id',$question->id)}}
  {{ Form::hidden('solved',0)}}
 	<textarea class="form-control" rows="5" name="question" style="width:40em; margin-left: auto;
    margin-right: auto; margin-bottom:1em;">{{ $question->question }}</textarea>
    {{Form::submit('Edit Your Question',array('class'=>'btn btn-success'))}}
	
	{{Form::close()}}
	@if($message = Session::get('message'))
	{{$message}}
	@endif
</div>
 
 @stop