				    	@foreach($solved_questions as $question)
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
													{{Form::open(array('url'=>'answer','method'=> 'post'))}}
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

						  				{{$solved_questions->links()}}
