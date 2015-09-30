
@extends('main')
<style>
	body{
		text-align: center;
	}
</style>
@section('content')
 <div class="question">
 	<h1> Put your question here!</h1>
 	<form method="post" action="">
 	<textarea class="form-control" rows="5" name="question" style="width:40em; margin-left: auto;
    margin-right: auto; margin-bottom:1em;"></textarea>
	<button type="button" name="submit" class="btn btn-success" style="font-size:3em; width:8em;">Ask</button>
	</form>
</div>
 @stop