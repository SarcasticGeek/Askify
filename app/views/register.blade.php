
@extends('hello')
<style>
	form
	{
		margin-top: 10px;
	}
</style>
@section('content')
{{Form::open(array('url'=>'register','class'=>'form-horizontal'))}}
				<div class="form-group">
			    <label for="inputUsername" class="col-sm-3 control-label">Username</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="username" >
			  </div>
			  </div>
			   <div class="form-group">
				    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email"required>
				    </div>
 			 </div>
 			   <div class="form-group">
				    <label for="inputEmail3" class="col-sm-3 control-label"> password</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control"  name="password" id="inputEmail3" placeholder="password" required>
				    </div>
 			 </div>
 			 
				<button type="submit" class="btn btn-success" style="font-size:2em;">Sign up</button>


			{{Form::close()}}

@stop
