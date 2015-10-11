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
<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title">{{ ucfirst($question->user->username) }} in tags: 
    @foreach($question->tags as $tag)
    #{{ $tag->name }} , 
    @endforeach
    asks:</h2></div>
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
	     <div class="answer">
	 	<h1> Put your Answer here!</h1>
	 {{Form::open(array('url'=>'answer','method'=> 'post'))}}
	{{Form::token()}}
	{{Form::hidden('question_id',$question->id)}}
	 	<textarea class="form-control" rows="5" name="answer" style="width:40em; margin-left: auto;
	    margin-right: auto; margin-bottom:1em;"></textarea>

	{{Form::submit('Answer',array('class'=>'btn btn-success'))}}
		
	{{Form::close()}}
		
	</div>
	@endif
@else 
<p>Please Login</p>
@endif
	<div id="answers">
	<h2>Answers</h2>
	@if(count($question->answers)==0)
		<p>No Answrer</p>
	@else
	<ul class="list-group">
		@foreach($question->answers as $answer)
		<li class="list-group-item"><h4 class="list-group-item-heading" >{{ e($answer->answer) }}  </h4>
		<h5> updated at : {{ date('h:i A d/m/Y',strtotime($answer->updated_at)) }}

		@if(Auth::check())
			@if($answer->user_id === Auth::User()->id)
			 {{ HTML::linkRoute('edit_answer','Edit my Answer',$answer->id,array('class' => 'btn btn-default','role'=>'button')) }}
			@endif
		@endif
		</h5>	
		</li>
		@endforeach
	</ul>
	@endif	
	</div>

@stop