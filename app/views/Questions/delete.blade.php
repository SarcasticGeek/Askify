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
@if(Session::has('message'))
	<div class="alert alert-success" role="alert">
			{{ Session::get('message') }}
			</div>
@endif
<div>
	<h1>{{ e($question->question)}}	</h1>
	
</div>
<div>
	<p>Are You Sure You Want To Delete This Question?</p></div>
<div>
<p>{{ HTML::linkRoute('after_delete_question', 'yes',$question->id) }} -- {{ HTML::linkRoute('your_questions', 'no') }}</p>
{{ Form::open(array('url'=>'question//delete')) }} 
 {{Form::token()}}
 {{ Form::hidden('question_id',$question->id)}}

 {{Form::close()}}
</div>

@stop