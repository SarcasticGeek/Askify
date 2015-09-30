<?php

class RegisterController extends BaseController{

	public function showRegister(){
		$user = new User;
		$user->email='hmelklk';
		$user->username='hme';
		$user->password='1000';
		$user->save();
		return View::make('register');

	}

	public function doRegister(){
		$user = new User;
		$user->email=Input::get('email');
		$user->username=Input::get('username');
		$user->password=Hash::make(Input::get('password'));
		$user->save();
		return View::make('thanks');
	}
}