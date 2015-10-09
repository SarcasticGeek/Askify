
@extends('main')
<style>
	body{
		text-align: center;
	}
	.question{
		background-color: #f2f3e7;
		border-radius:5px;
		margin:-13px;
		margin-bottom: 10px;
		margin-top: 10px;
		padding: 20px;
		padding-top: 5px;
		padding-bottom: 5px;
		height: 100px;
	}
	.questionlist ul{
		text-align: left;
		background-color: #f2f3e7;
		border-radius:5px;
		margin:-13px;
		margin-bottom: 10px;
		margin-top: 10px;
		margin-bottom: 20px;
		padding: 20px;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.question.form-control{
		width:40px;
		margin: 50px;
	}

	
</style>
@section('content')
 <div class="questionlist">
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
 {{Form::open(array('url'=>'tag/new','method'=> 'post'))}}
{{Form::token()}}
 	<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Add A Tag</span>
  <input type="text" class="form-control" name="name" placeholder="Add A Tag" aria-describedby="sizing-addon1">
</div>
    {{Form::submit('Add',array('class'=>'btn btn-success'))}}
	
	{{Form::close()}}
	@if($message = Session::get('message'))
	{{$message}}
	@endif
</div>
@endif

    @if(count($tags)==0)
        <p>Nothing found.</p>
    @else
        <ul>
            @foreach($tags as $tag)
                <li>
                    {{ HTML::linkRoute('tag', $tag->name, $tag->id) }}
                </li>
            @endforeach
        </ul>
@endif
 </div>
 @stop