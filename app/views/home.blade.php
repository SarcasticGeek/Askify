
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
	#ask{
		margin-left: -1000px;
		margin-top: -5px;
		width: 120px;
	}
	#label{
		margin-top: -100px;
		margin-left: 200px;
	}
	#tag{
		margin-left: -10px;
		margin-top: 30px;
	}


	
</style>
@section('content')
<?php
session_start();
?>
@if($reportsuccess = Session::get('report-success'))
{{$reportsuccess}}
@endif
@if(Auth::User()->iFadmin != 1)
 <div class="question">

 	{{Form::open(array('url'=>'home'))}}
 	<textarea class="form-control"  name="question" placeholder="Put your question here!"></textarea>
<div id="tag">
  <div class="dropdown">
  <button class="btn btn-infoo dropdown-toggle" type="button" data-toggle="dropdown">Tags
  <span class="caret"></span></button>
  <ul class="dropdown-menu dropdown-menu-right top1">
    @foreach($tags as $tag)
    <li> {{Form::label($tag->name) }}
    {{ Form::checkbox('tags[]',$tag->id,false)}}</li>       
    @endforeach              
  </ul>
</div>
</div>
<br/>
    {{Form::submit('Ask',array('class'=>'btn btn-infoo ','id'=>'ask'))}}
   <div id="label">
    {{Form::checkbox('private',1,false)}}
    {{Form::label('Private Question')}}
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
		 	@if($question->private == 0)
		 	<ul>
		 		<p><strong>{{ucfirst($question->user->username)}}</strong></p>
		 		<p>{{ str_limit($question->question,40,"...") }}</p> 
		 		<p style="font-size: 12px"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
				{{ HTML::linkRoute('question','View',$question->id) }}
				@if(Auth::User()->iFadmin == 1)
				{{HTML::linkRoute('home/report','Report',array($question->User->username,$question->id))}}
				@endif
			</p>
			</ul>
			@endif
	@endforeach
	{{ $questions->links()}}
	@endif
 </div>
 @stop
 
