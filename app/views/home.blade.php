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
 	<h1> Put your question here!</h1>
 {{Form::open(array('url'=>'home'))}}
  {{Form::token()}}

 	<textarea class="form-control" rows="5" name="question" style="width:40em; margin-left: auto;
    margin-right: auto; margin-bottom:1em;"></textarea>
    {{Form::submit('Ask',array('class'=>'btn btn-success'))}}
	
	{{Form::close()}}
	@if($message = Session::get('message'))
	{{$message}}
	@endif
</div>
 <div class="questionlist">
	 <h1>Others Questions:</h1>
	 @if(!$questions)
		 <p>No Quests</p>
	 @else
		 <ul>
		  	@foreach($questions as $question)
		 		<li>{{ str_limit($question->question,40,"...") }} by {{ucfirst($question->user->username)}}
				({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
				{{ HTML::linkRoute('question','View',$question->id) }}
				</li>
			@endforeach
		 </ul>
		 {{ $questions->links()}}
	 @endif
 </div>
 @stop