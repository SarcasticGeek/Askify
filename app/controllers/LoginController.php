<?php

class LoginController extends BaseController{

	public function showLogin(){
		return View::make('login');
	}


	public function doLogin(){
		$credit = Input::only('username','password');
		if(Auth::attempt($credit,true)){
			return Redirect::intended('/');
		}
		return Redirect::to('/login');
	}
}