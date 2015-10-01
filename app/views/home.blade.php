
@extends('main')
<style>
	body{
		text-align: center;
	}
</style>
@section('content')
 <div class="question">
 	<h1> Put your question here!</h1>
 {{Form::open(array('url'=>'home'))}}
 	<textarea class="form-control" rows="5" name="question" style="width:40em; margin-left: auto;
    margin-right: auto; margin-bottom:1em;"></textarea>
    {{Form::submit('Ask',array('class'=>'btn btn-success'))}}
	
	{{Form::close()}}
	@if($message = Session::get('message'))
	{{$message}}
	@endif
</div>
 <div>
	 <h1>{{ ucfirst($username) }} Questions:</h1>
	 @if(!$questions)
		 <p>No Quests</p>
	 @else
		 <ul>
			 @foreach($questions as $question)
				 <li>{{ str_limit($question->question,40,"...") }} by {{ucfirst($question->user->username)}}
					 
					  </li>
			 @endforeach
		 </ul>
		 {{ $questions->links()}}
	 @endif
 </div>
 @stop