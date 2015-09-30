@extends('hello')
@section('content')

{{Form::open(array('url'=>'login'))}}

{{Form::label('username','Username')}}
{{Form::text('username')}}<br/>

{{Form::label('password','Password')}}
{{Form::password('password')}}<br/>

{{Form::submit('Sign In')}}
{{Form::close()}}
@stop