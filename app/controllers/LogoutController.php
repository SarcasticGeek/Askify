<?php

class LogoutController extends BaseController{

	

	public function doLogout(){
		Auth::logout();
		return Redirect::to('/');
		
	
		}
}