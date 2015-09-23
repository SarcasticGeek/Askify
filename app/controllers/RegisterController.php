<?php

class RegisterController extends BaseController{

	public function showRegister(){
		return View::make('register');
	}
}