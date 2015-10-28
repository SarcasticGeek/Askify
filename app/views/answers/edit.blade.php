
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
    <div class="panel-heading"><h2 class="panel-title"><strong>{{ ucfirst($question->user->username) }}</strong></h2></div>
    <div class="panel-body">
      </h3 > {{ e($question->question) }}</h3>
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
	    margin-bottom:1em; margin-right:30px;float: left;">{{ $answer->answer }}</textarea>
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