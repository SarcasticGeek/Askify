@extends('main')
<style>
	body{
		text-align: center;
	}
	.hh{
		font-size: 15px;
		font-weight: bold;
	}
</style>
@section('content')
<div>
	<h1 class="hh">Choose image to upload!</h1>
	<div>
		{{Form::open(array('url'=>'upload','files'=>true))}}
		{{Form::file('image', array('multiple'=>false))}}
		{{Form::submit('Submit', array('class'=>'send-btn'))}}
		{{Form::close()}}
	</div>
</div>
@stop