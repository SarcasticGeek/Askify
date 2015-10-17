
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
	.questionlist ul img
	{
		border-radius: 50%;
	}

	input[type="checkbox"] {
		width:15px;
    	height:15px;
		vertical-align:-2px;
		box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
	}
	#ask{
		margin-left: -1200px;
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
<div id="IMG">
    	<div class="dropdown">
  			<button class="btn btn-infoo dropdown-toggle" type="button" data-toggle="dropdown" style=margin-top:39px;margin-right:920px;>Upload Image!</button>
  			<p class="dropdown-menu dropdown-menu-right" style="margin-right:450px;top:20%;background-color:rgba(0,0,0,0.6);	color:white;		
			height: 50px;
			padding: 20px;
			padding-top: 10px;
			padding-bottom: 5px;">
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
	@foreach($tags as $tag)
		@foreach($tag->questions as $question)
		<ul>
			<p><strong>
				 		<?php 
				 		 $hashed_mail=md5( strtolower( trim( $question->user->email)));
				 		 $grav_url = "http://www.gravatar.com/avatar/" .$hashed_mail;
				 		?>
				 			  <img src="<?php echo $grav_url; ?>" hieght="40px" width="40px"> 
				{{
		 		ucfirst($question->user->username)
				}}</strong></p>
				<p>{{ str_limit($question->question,40,"...") }}</p> 
				<p style="font-size: 12px"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
				<p> #{{ $tag->name}} </p>
				{{ HTML::linkRoute('question','View',$question->id) }}
				@if(Auth::User()->iFadmin == 1)
					{{HTML::linkRoute('home/report','Report',array($question->User->username,$question->id))}}
				@endif
			</ul>
		@endforeach
	@endforeach
	{{ $questions->links()}}
	@endif
 </div>
 @stop
 
