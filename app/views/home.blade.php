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
		position: fixed;
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
	#left .arrow3{
		margin-top: -160px;
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
	.questionlistajax ul{
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
		.questionlistajax1 ul{
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
		.questionlistajax2 ul{
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
	.user_name{
		font-size: 20px;
		font-style: bold;
		display: block;
		font-weight: bold;
	}
	.user_name:first-letter {
    text-transform: capitalize;
	}
	.question_name, .count_answers{
		font-size: 12px;
		margin-left: 35px;
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
	<div id="left" style="display:block;">
		<ul class="nav">
		    <li role="presentation" class="active Date" id="number1">
		    	<a href="#date" aria-controls="date" role="tab" data-toggle="tab">Date</a>
		    	<div class="arrow1"></div>
		    </li>
		    <li role="presentation" class="Answered" id="number2">
		    	<a href="#answered" aria-controls="answered" role="tab" data-toggle="tab">Answered</a>
		    	<div class="arrow2"></div>
		    </li>
		    <li role="presentation" class="Tags" id="number3">
		    	<a href="#tags" aria-controls="Tags" role="tab" data-toggle="tab">Tags</a>
		    	<div class="arrow3"></div>
		    </li>
		    <li class ="nothing">	
				@foreach($tags as $tag)
					<ul class="check" style="font-size: 18px">
				    	{{Form::checkbox('tags',$tag->id,false)}}
				   		{{Form::label($tag->name) }}
				   	</ul>       
				@endforeach
			</li>

	  	</ul> 		
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
		  				<ul class="dropdown-menu dropdown-menu-right top1"  style="margin-top: -65px;background-color:rgba(0,0,0,0.6); color:white;padding: 20px;padding-top: 10px; padding-bottom: 5px;">

					 	   @foreach($tags as $tag)
					    		<li>
								{{ Form::checkbox('tags[]',$tag->id,false)}}
		    					{{Form::label($tag->name) }}
		    				</li>       

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
			  			<p class="dropdown-menu dropdown-menu-right" style="margin-right:100px;margin-top:-65px;background-color:rgba(0,0,0,0.6);	color:white;		
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
				<div class="tab-content" style="display: block;">
				    <div role="tabpanel" class="tab-pane active" id="date"><h1>Order Questions By Date *default view*</h1></div>
				    <div role="tabpanel" class="tab-pane" id="answered">
				    	<h1>View Answered Questions Only *ordered by date*</h1>
				    	@foreach($questions as $question)
							@if($question->private == 0)
								<ul>
									<div class="panel panel-default"style="margin-top:30px; margin-left:-50px; text-align: left; width:876px;">
   										<div class="panel-heading"><h2 class="panel-title"style="font-size: 18px;font-family: 'Handlee', cursive;">
										 	<?php 
										 	 $hashed_mail=md5( strtolower( trim( $question->user->email)));
											 $grav_url = "http://www.gravatar.com/avatar/" .$hashed_mail;
									 		?>
							 			 	<img src="<?php echo $grav_url; ?>" height="30px" width="30px"> 
									 		<strong>{{ucfirst($question->user->username)}}
									 		</strong>
									 		</h2>
								 		</div>
    									<div class="panel-body" style="padding-top: 0px; padding-bottom: 0px;">
	      									<h2 style="margin-left: 35px; font-size:15px;font-family: 'Handlee', cursive;">{{ str_limit($question->question,40,"...") }}
	      										<span>
			  										<p style="float:right;"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
			  											{{ HTML::linkRoute('question','View',$question->id) }}
			  										</p><br/>
		  											<p style="float:right; margin-right: -70px;">
													@if(Auth::User()->iFadmin == 1)
														{{HTML::linkRoute('home/report','Report',array($question->User->username,$question->id))}}
													@endif
													</p>
			  									</span>
	      									</h2>
											<p>
												@if(Auth::User()->iFadmin == 1)
													{{Form::open(array('url'=>'home','method'=> 'post'))}}
													{{Form::token()}}
													{{Form::hidden('question_id',$question->id)}}
													<textarea class="AnswerArea"  style="margin-left: 35px;width:800px; margin-top:5px;" 
													name="answer" placeholder="Put your answer here!"></textarea><br/></br>
													<p style="margin-left: 400px;">
													{{Form::submit('Answer', array('class'=> 'AnswerButton'))}}
													{{Form::close()}}
													</p>
												@endif
											</p>
    									</div>
									</div>
								</ul>
							@endif
						@endforeach
						{{ $questions->links()}}</div>

						{{-- Tags tab --}}
				    <div role="tabpanel" class="tab-pane" id="tags">
				    	<div class="questionlistajax">
						</div>
						<div class="questionlistajax1">
						</div>
						<div class="questionlistajax2">
						</div>
						<div class="questionlistajax3">
						</div>
						<div class="questionlistajax4">
						</div>
						<div class="questionlistajax5">
						</div>
						<div class="questionlistajax6">
						</div>
						<div class="questionlistajax7">
						</div>
						<div class="questionlistajax8">
						</div>
				    </div>
		  		</div>			
			@endif
	 	</div>
	</div>
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
	$('')
	var y = {{ Tag::get()->count() }} ;
	var x = y / 2 * 120 ;
	$(".Tags a").css("height", x);

	var M = {{Tag::where('id', Tag::get()->count() + 1)->pluck('id')}} 

        $('.check input[type="checkbox"]').click(function(){
        	var tagid = $(this).val();
       		for (i = 1; i <= M.length; i++){
            	if($(this).prop("checked") == true){
            		if(tagid == i){

            			var CCK = $(this).val();
            			var url ="home/Tagsajax";
                		$.ajax({
                			type: 'GET',
                			url: url,
                			cache:false,
                			data: {CCK:CCK},
                			dataType:'json',
                			success: function(data){
                				var max = Object.keys(data).length;
                				html = "";
                				if(tagid == 1)
                					var classification = ".questionlistajax";

                				else if(tagid == 2)
                					var classification = ".questionlistajax1";

                				else if(tagid == 3)
                					var classification = ".questionlistajax2";

                				else if(tagid == 4)
                					var classification = ".questionlistajax3";

                				else if(tagid == 5)
                					var classification = ".questionlistajax4";

                				else if(tagid == 6)
                					var classification = ".questionlistajax5";

                				else if(tagid == 7)
                					var classification = ".questionlistajax6";

                				else if(tagid == 8)
                					var classification = ".questionlistajax7";

                				else if(tagid == 9)
                					var classification = ".questionlistajax8";

                				for(var m =0 ; m<max ; m++){
                					var user_name = data[m].a;
                					var question_name = data[m].b;
                					var count_answers = data[m].c;
                					var question_id = data[m].d;
                					var view = "view";
                					var varurl = "question/" + question_id;
                					html += "<ul>";
                					html += '<p class = "user_name">' + user_name +'</p>';
                					html += '<p class = "question_name">' + question_name +'</p>';
                					html += '<p class = "count_answers">' + '(' + count_answers  + 'Answers' +')' + ' '+ '<a href=" ' + varurl + ' ">view</a>' + '</p>';
                					html += "</ul>";

                					$(classification).append(html);
                					html = "";

	                 			}

                			},
                			error: function(){
                				console.log('something happend');
                			}
                		});


            		}
            	}
            	else if($(this).prop("checked") == false){
            		if(tagid == i){
            			if(tagid == 1)
            				$(".questionlistajax").empty();

            			else if (tagid == 2)
            				$(".questionlistajax1").empty();

            			else if (tagid == 3)
            				$(".questionlistajax2").empty();

            			else if (tagid == 4)
            				$(".questionlistajax3").empty();

            			else if (tagid == 5)
            				$(".questionlistajax4").empty();

            			else if (tagid == 6)
            				$(".questionlistajax5").empty();

            			else if (tagid == 7)
            				$(".questionlistajax6").empty();

            			else if (tagid == 8)
            				$(".questionlistajax7").empty();

            			else if (tagid == 9)
            				$(".questionlistajax8").empty();

            		}		
        		}
        	}
        });

</script>
@stop