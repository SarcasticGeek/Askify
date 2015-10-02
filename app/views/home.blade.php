
@extends('main')
<style>
	body{
		text-align: center;
	}
</style>
@section('content')
 <div class="question">
 	<h1> Put your question here!</h1>
 	{{Form::open(array('url'=>'home'))}}
 	<textarea class="form-control" rows="5" name="question" style="width:40em; margin-left: auto;
    margin-right: auto; margin-bottom:1em;"></textarea>
    {{Form::submit('Ask',array('class'=>'btn btn-success'))}}
	
	{{Form::close()}}
	@if($message = Session::get('message'))
	{{$message}}
	@endif
</div>
 @stop


// mafesh leh ??
// @if(Auth::check())