
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

 <div class="questionlist" style="margin-top:30px; ">
 <h1 style="text-align: left; border-bottom:3px solid rgb(0,0,0); margin-left:-10px; text-transform: uppercase;">{{ $tag->name }}</h1>
	@if(count($tag->questions)===0)
		 <p>No Questions</p>
	@else
	@foreach($tag->questions as $question)


<div class="panel panel-default"style="margin-top:30px; margin-left: -15px; text-align: left;">
    <div class="panel-heading"><h2 class="panel-title"><strong>{{ucfirst($question->user->username)}}</strong></h2></div>
    <div class="panel-body">
      </h2> {{ str_limit($question->question,40,"...") }}</h2><br/><br/>
  <p style="font-size: 12px"> ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
				{{ HTML::linkRoute('question','View',$question->id) }}</p>
			

    </div>
</div>



	@endforeach
	@endif
 </div>
 @stop
