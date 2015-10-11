<?php

class LogoutController extends BaseController{

	

	public function doLogout(){
        if(Auth ::user()->confirmationcode == 'f')
        {
            $hauth=new Hybrid_Auth(app_path().'/config/fb_auth.php');
            $hauth->logoutAllProviders();
        }
        Session::flush();
		Auth::logout();
		return Redirect::to('/');
		
	
}
}