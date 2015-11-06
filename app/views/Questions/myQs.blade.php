@extends ('main')

<style>
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
	/*.questionlist ul{
		border: 1px solid #e5e5e5;
		text-align: left;
		background-color: rgba(255,255,255,1);
		margin:-13px;
		margin-top: 10px;
		margin-bottom: 20px;
		padding: 20px;
		padding-top: 10px;
		padding-bottom: 5px;
	}*/
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
	#left {
		margin: 20px;
		margin-left: -15px;
		width: 250px;
		height: 730px;
		background-color: #4183D7;
		float: left;
	}
	#left .nav a{
		width: 250px;
		height: 120px;
		color: #ECF0F0;
		font-size: 25px;
		text-align: left;
		border:0px;
		border-top:2px solid #ECF0F0;
		border-radius: 0;
		padding-left:32px;
	}
	#left .nav > li.active > a, #left .nav > li > a:hover{background-color: #286193;}
	#left .Date{
		margin-top: 150px;
	}
	#left .Tags a{
		border-bottom:2px solid #ECF0F0;
	}
	#left .arrow1, #left .arrow2, #left .arrow3{
		width: 0;
		height: 0;
		border-top: 20px solid transparent;
		border-bottom: 20px solid transparent;
		border-right: 20px solid #ECF0F0;
		margin-right: 0px;
		margin-top: -100px;
		float: right;
		position: relative;
	}

	#left .nothing{
		top: -128px;
		left: 18%;
		text-align: left;
		color: #ECF0F0;
		height:auto;
	}
	.tagname{
		position: relative;
		left: 700px;
	}
</style>

@section('content')
<?php
session_start();
?>
@if($reportsuccess = Session::get('report-success'))
{{$reportsuccess}}
@endif


	<div id="left" style="display:block;">
		<ul class="nav">
		    <li role="presentation" class="active Date" id="number1">
		    	<a href="#date" aria-controls="date" role="tab" data-toggle="tab">Answered</a>
		    	<div class="arrow1"></div>
		    </li>
		    <li role="presentation" class="Answered" id="number2">
		    	<a href="#answered" aria-controls="answered" role="tab" data-toggle="tab">Not Answered</a>
		    	<div class="arrow2"></div>
		    </li>
	  	</ul> 		
	</div>

<div class="questionlist">
	@if(!$questions)
		<p>No Questions</p>
	@else
		<div class="tab-content" style="display: block;">
		    <div role="tabpanel" class="tab-pane active" id="date">
		    	@foreach($questions as $question)
					@if($question->solved == 1)
						<ul>
							<div class="panel panel-default"style="margin-top:30px; margin-left:-50px; text-align: left; width:850; height: 50px; float:right;">
								<div class="panel-body" style="padding-top: 0px; padding-bottom: 0px;">
  									<h2 style="margin-left: 35px; font-size:15px;font-family: 'Handlee', cursive;">{{ str_limit($question->question,40,"...") }}
  										<span>
	  										<p style="float:right;"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
	  											{{ HTML::linkRoute('question','View',$question->id) }}
	  											 {{ HTML::linkRoute('edit_question','Edit',$question->id)}}
					  							{{ HTML::linkRoute('delete_question','Delete',$question->id)}}
	  										</p><br/>
  											<p style="float:right; margin-right: -70px;">
											@if(Auth::User()->iFadmin == 1)
												{{HTML::linkRoute('home/report','Report',array($question->User->username,$question->id))}}
											@endif
											</p>
	  									</span>
  									</h2>
								</div>
							</div>
						</ul>
					@endif
				@endforeach

		    </div>


		    <div role="tabpanel" class="tab-pane" id="answered">
		    	@foreach($questions as $question)
					@if($question->solved == 0)
						<ul>
							<div class="panel panel-default"style="margin-top:30px; margin-left:-50px; text-align: left; width:850; height: 50px; float:right;">
								<div class="panel-body" style="padding-top: 0px; padding-bottom: 0px;">
  									<h2 style="margin-left: 35px; font-size:15px;font-family: 'Handlee', cursive;">{{ str_limit($question->question,40,"...") }}
  										<span>
	  										<p style="float:right;"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
	  											{{ HTML::linkRoute('question','View',$question->id) }}
	  											{{ HTML::linkRoute('edit_question','Edit',$question->id)}}
					  							{{ HTML::linkRoute('delete_question','Delete',$question->id)}}
	  										</p><br/>
  											<p style="float:right; margin-right: -70px;">
											@if(Auth::User()->iFadmin == 1)
												{{HTML::linkRoute('home/report','Report',array($question->User->username,$question->id))}}
											@endif
											</p>
	  									</span>
  									</h2>
								</div>
							</div>
						</ul>
					@endif
				@endforeach    	
			</div>
  		</div>	
	</div>



	 @endif
 </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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