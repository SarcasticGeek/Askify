<?php

class LoginController extends BaseController{

	public function showLogin(){
		if(Auth::check()){
 		return Redirect::Route('others_questions');
 		}
		return View::make('login');
	}


	public function doLogin(){
		$credit = Input::only('username','password');
		$validator = Validator::make($credit,array('username'=>'required','password'=>'required'));
		if($validator->fails()){
			return Redirect::to('login')->withInput()->withErrors($validator);
		}
		else{

			if(Auth::attempt($credit,true)){
			return Redirect::intended('/home');
			}
		return Redirect::to('/login')->withInput()->with('loginerror','Username Or Password Is Incorrect');
		}
	}
}