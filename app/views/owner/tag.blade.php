
@extends('main')
<style>
	body{
		text-align: center;
	}
	.question{
		background-color: #f2f3e7;
		border-radius:5px;
		margin:-13px;
		margin-bottom: 10px;
		margin-top: 10px;
		padding: 20px;
		padding-top: 5px;
		padding-bottom: 5px;
		height: 100px;
	}
	.questionlist ul{
		text-align: left;
		background-color: #f2f3e7;
		border-radius:5px;
		margin:-13px;
		margin-bottom: 10px;
		margin-top: 10px;
		margin-bottom: 20px;
		padding: 20px;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.question.form-control{
		width:40px;
		margin: 50px;
	}

	
</style>
@section('content')

 <div class="questionlist">
 <h1>{{ $tag->name }}</h1>
	@if(count($tag->questions)===0)
		 <p>No Questions</p>
	@else
	@foreach($tag->questions as $question)
		 	<ul>
		 		<p><strong>{{ucfirst($question->user->username)}}</strong></p>
		 		<p>{{ str_limit($question->question,40,"...") }}</p> 
		 		<p style="font-size: 12px"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
				{{ HTML::linkRoute('question','View',$question->id) }}</p>
			</ul>
	@endforeach
	@endif
 </div>
 @stop