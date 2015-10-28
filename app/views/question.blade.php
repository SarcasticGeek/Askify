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
    <div class="panel-heading"><h2 class="panel-title"><strong>{{ ucfirst($question->user->username) }}</strong> 
    <span style="float: right;">@foreach($question->tags as $tag)
    #{{ $tag->name }} 
    @endforeach </span>
    </h2></div>
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
	@if(Auth::User()->iFadmin == 1)
	     <div class="answer" style="text-align: left; margin-top: 20px;">
	 {{Form::open(array('url'=>'answer','method'=> 'post'))}}
	{{Form::token()}}
	{{Form::hidden('question_id',$question->id)}}
	 	<textarea class="form-control" rows="5" name="answer" style="width:1150px; margin-left: -13px;
	    margin-bottom:1em; margin-right:30px;float: left;" placeholder="Put your Answer here!"></textarea>
	<div style="padding-top: 75px; margin-left: 500px;">
	{{Form::submit('Answer',array('class'=>'btn btn-success'))}}
	</div>
	{{Form::close()}}
		
	</div>
	@endif
@else 
<p>Please Login</p>
@endif
	<div id="answers" class="panel panel-default"style="margin-top:30px; margin-left: -13px; text-align: left;">
	<div class="panel-heading"><h2 class="panel-title"><strong>Answers</strong></h2></div>
	@if(count($question->answers)==0)
		<div class="panel-body" style="text-align: left;"><p>No Answrer</p></div>
	@else
	<ul class="list-group">
		@foreach($question->answers as $answer)
		<div class="panel-body" style="border-bottom: 2px solid #e5e5e5;">
		<li class="list-group-item">
			<h4 class="list-group-item-heading" style="margin-left: -12px;" >{{ e($answer->answer) }}  </h4>
			<h5 style="float:right;">
				@if(Auth::check())
				@if($answer->user_id === Auth::User()->id)
			 	{{ HTML::linkRoute('edit_answer','Edit my Answer',$answer->id,array('class' => 'btn btn-default','role'=>'button')) }}
				@endif
				@endif
				<br />
				<div style="margin-top: 15px;"> updated at : {{ $answer->updated_at->diffForHumans() }} </div>
		</h5>	
		</li>
		</div>
		@endforeach
	</ul>
	@endif	
	</div>

<div style="margin-bottom: 30px;">
	<!-- Twitter -->
<a href="http://twitter.com/home?status={{ e($question->question) }} %23AskifyApp by {{ ucfirst($question->user->username) }} {{ Request::url();}} " title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
 <!-- Facebook -->
<a href="https://www.facebook.com/sharer/sharer.php?u={{ e($question->question) }} #AskifyApp by {{ ucfirst($question->user->username) }} {{ Request::url();}} " title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
<!-- Google+ -->
<a href="https://plus.google.com/share?url={{ Request::url();}}" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
<!-- StumbleUpon -->
<a href="http://www.stumbleupon.com/submit?url={{ Request::url();}}" title="Share on StumbleUpon" target="_blank" data-placement="top" class="btn btn-stumbleupon"><i class="fa fa-stumbleupon"></i> Stumbleupon</a>
</div>

@stop
