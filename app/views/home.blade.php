
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
	input[type="checkbox"] {
		width:15px;
    	height:15px;
		vertical-align:-2px;
		box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
	}

	
</style>
@section('content')
@if(Auth::User()->iFadmin != 1)
 <div class="question">

 	{{Form::open(array('url'=>'home'))}}
 	<textarea class="form-control"  name="question" placeholder="Put your question here!"></textarea>
    {{Form::submit('Ask',array('class'=>'btn btn-success '))}}
   
    {{Form::checkbox('private',1,true)}}
    {{Form::label('Private Question')}}

	
	{{Form::close()}}

	@if($message = Session::get('message'))
	{{$message}}
	@endif

</div>
@endif
 <div class="questionlist">
	@if(!$questions)
		 <p>No Questions</p>
	@else
	@foreach($questions as $question)
		 	@if($question->private == 0)
		 	<ul>
		 		<p><strong>{{ucfirst($question->user->username)}}</strong></p>
		 		<p>{{ str_limit($question->question,40,"...") }}</p> 
		 		<p style="font-size: 12px"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
				{{ HTML::linkRoute('question','View',$question->id) }}</p>
			</ul>
			@endif
	@endforeach
	{{ $questions->links()}}
	@endif
 </div>
 @stop