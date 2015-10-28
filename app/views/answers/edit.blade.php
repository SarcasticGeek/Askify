
@extends('main')
<style>
    body{
        text-align: center;
    }
</style>
@section('content')
@if(Session::has('message'))
			<div class="alert alert-success" role="alert">
			{{ Session::get('message') }}
			</div>
		@endif

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
      <h2 style="margin-left: 35px; font-size:15px;font-family: 'Handlee', cursive;"> {{ e($question->question) }}</h2>
    </div>
</div>
@if($errors->has())
	<div class="alert alert-danger" role="alert">
	<p>ERRORS</p>
	<ul id="form-errors">
		{{ $errors->first('answer','<li>:message</li>') }}
	</ul>
	</div>
		
@endif
@if(Auth::check())
     <div class="answer">
 {{Form::open(array('url'=>'answer/update','method'=> 'post'))}}
{{Form::token()}}
{{Form::hidden('question_id',$question->id)}}
{{Form::hidden('answer_id',$answer->id)}}

 	<textarea class="form-control" rows="5" name="answer" style="width:1150px; margin-left: -13px;
	    margin-bottom:1em; margin-right:30px;float: left; padding-left: 45px; padding-top: 20px;">{{ $answer->answer }}</textarea>
	    <div style="padding-top: 75px; margin-left: 50px;">
    {{Form::submit('Edit',array('class'=>'btn btn-success'))}}
</div>
	
	{{Form::close()}}
	@if($message = Session::get('message'))
	{{$message}}
	@endif
</div>
@endif

@stop