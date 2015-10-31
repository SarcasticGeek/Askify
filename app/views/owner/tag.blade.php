
@extends('main')
<style>
	body{
		text-align: center;
	}
	.question.form-control{
		width:40px;
		margin: 50px;
	}

	
</style>
@section('content')

 <div class="questionlist" style="margin-top:30px; font-family: 'Handlee', cursive;">
 <h1 style="text-align: left; border-bottom:3px solid rgb(0,0,0); margin-left:-10px; text-transform: uppercase;font-family: 'Handlee', cursive;">{{ $tag->name }}</h1>
	@if(count($tag->questions)===0)
		 <p style="font-family: 'Handlee', cursive;">No Questions</p>
	@else
	@foreach($tag->questions as $question)


<div class="panel panel-default"style="margin-top:30px; margin-left: -15px; text-align: left;">
    <div class="panel-heading"><h2 class="panel-title"style="font-size: 18px;font-family: 'Handlee', cursive;">
		<?php 
		 $hashed_mail=md5( strtolower( trim( $question->user->email)));
	 $grav_url = "http://www.gravatar.com/avatar/" .$hashed_mail;
		?>
	 	<img src="<?php echo $grav_url; ?>" style="border-radius: 100%" height="30px" width="30px"> 
		<strong>{{ucfirst($question->user->username)}}
		</strong>
	</h2>
	</div>
    <div class="panel-body"style="padding-top: 0px; padding-bottom: 0px;">
      	<h2 style="margin-left: 35px; font-size:15px;font-family: 'Handlee', cursive;">
      		{{ str_limit($question->question,40,"...") }}
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
    </div>
</div>



    									

	@endforeach
	@endif
 </div>
 @stop
