@extends('main')
<style>
form
{
margin: 0 auto;
padding: 2em 3em 1em 5em;
margin-top: 2em;
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
{{Form::open(array('url' =>'edit' ,'class'=>'form-horizontal'))}}
			  <div class="form-group">
			    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="inputEmail3" name="username" value="{{Auth::user()->username;}}"placeholder="username" >
			  </div>
			  </div>
			   <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-5">
				      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" value="{{Auth::user()->email;}} " required>
				    </div>
 			 </div>
 			   <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label"> new password</label>
				    <div class="col-sm-5">
				      <input type="password" class="form-control"  name="password" id="inputEmail3" placeholder="password" required>
				    </div>
 			 </div>
 			   <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label"> confirm password</label>
				    <div class="col-sm-5">
				      <input type="password" class="form-control"  name="confirm_password" id="inputEmail3" placeholder="confirm password" required>
				    </div>
 			 </div>
				<button type="submit" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm" style="font-size:2em;">Update</button>
			@if(Session::get('message'))
 			 	<h4 style="color:red;">{{Session::get('message')}}</h4>
 			 @endif
			{{Form::close()}}
@stop