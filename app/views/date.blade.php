
				    <h1>Order Questions By Date *default view*</h1>
				     @foreach($orederd_questions as $question)
				    @if($question->private == 0)
								<ul>
								 	<p style="font-size: 18px">
									 	<?php
									 	 $hashed_mail=md5( strtolower( trim( $question->user->email)));
										 $grav_url = "http://www.gravatar.com/avatar/" .$hashed_mail;
								 		?>
						 			 	<img src="<?php echo $grav_url; ?>" height="30px" width="30px">
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

						<div class="date">
						
						{{$orederd_questions->links()}}
						</div>

