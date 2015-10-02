
@extends('hello')
@section('content')
{{Form::open(array('url'=>'register'))}}

{{Form::label('username','Username')}}
{{Form::text('username')}} <br/>

{{Form::label('password','Password')}}
{{Form::password('password')}}<br/>

{{Form::label('email','Email')}}
{{Form::text('email')}}<br/>

{{Form::submit('Sign Up')}}
{{Form::close()}}

@stop
