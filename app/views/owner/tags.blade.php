@extends('main')
<style>
	body{
		text-align: center;
	}
	footer
	{
		position: absolute;
		bottom: 0;
		width: 100%;
	}
	
	
</style>
@section('content')
<div class="questionlist"style="margin-top:30px;">
	@if($errors->has())
		<div class="alert alert-danger" role="alert">
		<p>ERRORS</p>
		<ul id="form-errors">
			{{ $errors->first('name','<li>:message</li>') }}
		</ul>
		</div>		
	@endif
	@if(Auth::check())
	    <div class="answer">
		 	{{Form::open(array('url'=>'owner/tag/new','method'=> 'post'))}}
			{{Form::token()}}
		 	<div class="input-group input-group-lg">
		  		<input type="text" class="form-control" name="name" placeholder="Add A Tag" 
		  		aria-describedby="sizing-addon1" style="width:300px;margin-left: -14px;">
			</div>
			<div style="margin-left:-130px;">{{Form::submit('Add',array('class'=>'btn btn1'))}}</div>
		
		{{Form::close()}}
		@if($message = Session::get('message'))
		{{$message}}
		@endif
	</div>
	@endif

	    @if(count($tags)==0)
	        <p>Nothing found.</p>
	    @else
	        <ul style="float:left; margin-left: -155px; margin-top: -50px;">
	            @foreach($tags as $tag)
	                <li  style="border: 5px solid #e5e5e5;text-align: center;background-color: rgba(255,255,255,1);margin-top: 50px;margin-bottom: 20px;margin-left: 100px; margin-right:-70px;padding: 10px;padding-bottom: 5px;display: inline-block;width:100px;height: 50px;">
	                    {{ HTML::linkRoute('tag', $tag->name, $tag->id) }}
	                </li>
	            @endforeach
	        </ul>
	@endif
</div>
 @stop
