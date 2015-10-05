@extends('main')
<style>
	body{
		text-align: center;
	}
	.questionlist{
		text-align: left;
	}

	.hh{
		text-align: left;
		font-size: 15px;
		font-weight: bold;
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
		height: 150px;
	}
	.questionlist{
		background-color: #f2f3e7;
		border-radius:5px;
		margin:-13px;
		margin-bottom: 10px;
		margin-top: 20px;
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
 <div class="question">

 	<h1 class = "hh"> Put your question here!</h1>
 	{{Form::open(array('url'=>'home'))}}
 	<textarea class="form-control"  name="question"></textarea>
    {{Form::submit('Ask',array('class'=>'btn btn-success '))}}
	
	{{Form::close()}}
	@if($message = Session::get('message'))
	{{$message}}
	@endif
</div>
 <div class="questionlist">
	 <h1 class = "hh">Others Questions:</h1>
	 @if(!$questions)
		 <p>No Quests</p>
	 @else
		 <ul>
		  	@foreach($questions as $question)
		 		<p>{{ str_limit($question->question,40,"...") }} <strong><em>By: 
		 			{{ucfirst($question->user->username)}}</em></strong>
				({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
				{{ HTML::linkRoute('question','View',$question->id) }}
				</p>
			@endforeach
		 </ul>
		 {{ $questions->links()}}
	 @endif
 </div>
 @stop