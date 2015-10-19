
@extends('main')

<style>
	body{
		text-align: center;
	}
	.navbar-inverse .navbar-collapse{
	}
	.question{
		border: 1px solid #e5e5e5;
		margin:-13px;
		margin-bottom: 10px;
		margin-top: 10px;
		padding: 20px;
		padding-top: 5px;
		padding-bottom: 5px;
		height: 110px;
	}
	.questionlist ul{
		border: 1px solid #e5e5e5;
		text-align: left;
		background-color: rgba(255,255,255,1);
		margin:-13px;
		margin-top: 10px;
		margin-bottom: 20px;
		padding: 20px;
		padding-top: 10px;
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
	
	#right{
		margin-top: 15px;
		float: right;
		width: 850px;
	}
	#left{
		margin: 20px;
		margin-left: -15px;
		width: 250px;
		height: 730px;
		background-color: #4183D7;
		float: left;
	}
	#left .btn-primary{
		background-color: rgba(0,0,0,0);
	}
	#left .btn-primary.active,.open > .dropdown-toggle.btn-primary{
  		background-color: #286193;
  	}
  	#left .btn-primary:hover{
  		background-color: #286193;
  	}

	#left .btn{
		height:120px;
		width:250;
		color: #ECF0F0;
		text-align: left;
		padding-left:32px;
		border:0px;
		border-top:2px solid #ECF0F0;
		border-radius: 0;
	}
	#left .Date{
		margin-top: 150px;
	}
	#left .arrow1, #left .arrow2, #left .arrow3{
		width: 0;
		height: 0;
		border-top: 20px solid transparent;
		border-bottom: 20px solid transparent;
		border-right: 20px solid #ECF0F0;
		margin-right: -13px;
		margin-top: 10px;
		float: right;
	}
	#left .Tags{
		border-bottom:2px solid #ECF0F0;
		/*height:auto;
		min-height: 200px;
		height:auto !important;*/
		height: 200px;
		padding-bottom: 5px;

	}
	#left .nothing{
		position: absolute;
		top: 78%;
		left: 10%;
		text-align: left;
		color: #ECF0F0;
	}
	#left .btn input[type=checkbox]{
		position:relative;
	}
</style>

@section('content')
<?php
session_start();
?>
@if($reportsuccess = Session::get('report-success'))
{{$reportsuccess}}
@endif

<div>
	<div id="left" data-toggle="buttons">
		<div class="Date btn btn-primary active" style="font-size: 25px" id="number1">
			<div class="arrow1"></div>
			<input type="radio" name="options" id="option1" autocomplete="off" checked>Date
		</div>

		<div class="Answered btn btn-primary" style="font-size: 25px" id="number2">
			<div class="arrow2"></div>
		    <input type="radio" name="options" id="option2" autocomplete="off">Answered
		</div>

		<div class="Tags btn btn-primary" style="font-size: 25px" id="number3">
			<div class="arrow3"></div>
		    <input type="radio" name="options" id="option3" autocomplete="off">Tags
		</div>
		<div class ="nothing">	
			@foreach($tags as $tag)
				<ul style="font-size: 18px"> 
			    	{{Form::checkbox('tags[]',$tag->id,false)}}
			   		{{Form::label($tag->name) }}
			   	</ul>       
			@endforeach
		</div>
	</div>
	<div id="right">
		@if(Auth::User()->iFadmin != 1)
	 		<div class="question" style="background-color:#f0f0f0">
	 			{{Form::open(array('url'=>'home'))}}
	 			<textarea class="form-control"  style="width:750px; margin-top:5px;" name="question" placeholder="Put your question here!"></textarea>
				<div id="tag">
		  			<div class="dropdown">
		  				<button class="btn btn-infoo dropdown-toggle" type="button" data-toggle="dropdown" style="border-radius:0">Tags
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
		    	{{Form::submit('Ask',array('class'=>'btn btn-infoo ','id'=>'ask', 'style'=>'margin-left:-10px; width:50px; border-radius:0;'))}}
		   		<div id="label">
				    {{Form::checkbox('private',1,false)}}
				    {{Form::label('Private Question')}}
				</div>
				<div id="IMG">
			    	<div class="dropdown">
			  			<button class="btn btn-infoo dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top:39px;margin-right:250px;border-radius:0;">Upload Image!</button>
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
			@foreach($questions as $question)
				@if($question->private == 0)
					<ul>
					 	<p style="font-size: 18px">
						 	<?php 
						 	 $hashed_mail=md5( strtolower( trim( $question->user->email)));
							 $grav_url = "http://www.gravatar.com/avatar/" .$hashed_mail;
					 		?>
			 			 	<img src="<?php echo $grav_url; ?>" hieght="30px" width="30px"> 
					 		<strong>{{ucfirst($question->user->username)}}
					 		</strong>
					 	</p>
					 	<p style="margin-left: 35px">{{ str_limit($question->question,40,"...") }}</p> 
					 	<p style="font-size: 12px; margin-left: 35px"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
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
	</div>
</div>

<script>
		$('.arrow2').hide();
		$('.arrow3').hide();
		$('.arrow1').show();
	$('#number1').click(function() {
		$('.arrow2').hide();
		$('.arrow3').hide();
		$('.arrow1').show();
});
	$('#number2').click(function() {
		$('.arrow1').hide();
		$('.arrow3').hide();
		$('.arrow2').show();
});
	$('#number3').click(function() {
		$('.arrow1').hide();
		$('.arrow2').hide();
		$('.arrow3').show();
});
</script>
@stop
 
