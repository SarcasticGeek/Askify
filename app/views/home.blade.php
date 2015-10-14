
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
		height: 110px;
	}
	.open>.dropdown-menu{
		background-color: rgba(0,0,0,0.6);
		color:white;		
		margin-top: 40px;
		width:400px;
		height: 50px;
		padding: 20px;
		padding-top: 10px;
		padding-bottom: 5px;
	}
	
	.questionlist ul{
		text-align: left;
		background-color: #f2f3e7;
		border-radius:5px;
		margin:-13px;
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

@if(Auth::User()->iFadmin != 1)
 <div class="question">
 	{{Form::open(array('url'=>'home'))}}
 	<textarea class="form-control"  name="question" placeholder="Put your question here!"></textarea>
    {{Form::submit('Ask',array('class'=>'btn btn-success pull-right', 'style'=>'margin:3px; margin-top: 10px;'))}}
    <div id="IMG">
    	<div class="dropdown">
  			<button class="btn btn-infoo dropdown-toggle" type="button" data-toggle="dropdown" style="float:right">Upload Image!</button>
  			<p class="dropdown-menu dropdown-menu-right">
   				{{Form::open(array('url'=>'upload','files'=>true))}}
				{{Form::file('image', array('multiple'=>false, 'style'=>'margin-bottom:20px'))}}
				{{Form::close()}}
			</p>
  		</div>
  	</div>
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
		 	<ul>
		 		<p><strong>{{ucfirst($question->user->username)}}</strong></p>
		 		<p>{{ str_limit($question->question,40,"...") }}</p> 
		 		<p style="font-size: 12px"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
				{{ HTML::linkRoute('question','View',$question->id) }}</p>
			</ul>
	@endforeach
	{{ $questions->links()}}
	@endif
 </div>
@stop