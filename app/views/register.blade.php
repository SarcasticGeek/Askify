
@extends('hello')
@section('content')
    {{Form::open(array('url'=>'register'))}}

    {{Form::label('username','Username',array('class'=>'pass'))}}
    {{Form::text('username',value(''),array('class'=>'user1'))}} <br/>
    <br/>
    {{Form::label('password','Password',array('class'=>'pass'))}}
    {{Form::password('password',array('class'=>'user1'))}}<br/>
    <br/>
    {{Form::label('email','Email',array('class'=>'pass1'))}}
    {{Form::text('email',value(''),array('class'=>'user1'))}}<br/>

    {{Form::submit('Sign Up',array('class'=>'signup'))}}
    {{Form::close()}}
@stop
