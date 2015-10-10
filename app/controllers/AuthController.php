<?php
class AuthController extends BaseController{
    public function getFacebookLogin($auth = NULL)
    {
        if($auth =='auth')
        {
            try
            {
                Hybrid_Endpoint::process();
            }
            catch(Exception $e)
            {
                return Redirect::to('facebookauth');
            }
            return;
        }
        $oauth = new Hybrid_Auth(app_path().'/config/fb_auth.php');
        $provider = $oauth->authenticate('Facebook');
        $profile = $provider->getUserProfile();
        $email = $profile->email;
        $username = $profile->displayName;
        $found = false;
        $users = DB::table('users')->get();
        foreach ($users as $user)
		{
			if($user->email == $email)
            {
                $userx =  DB::table('users')
                ->where('email', $email);
                $userx = User::find($user->id);
                Auth::login($userx);
                if(Auth::check())
                 {
                     return Redirect::intended('/home');
                 }
            }
         
        }
        if(!$found) {
              $newuser = new User;
              $newuser->email=$email;
              $newuser->username=$username;
              $password = str_random(6);
              $newuser->password=Hash::make($password);
              $newuser->confirmationcode = 'f';
              $newuser->confirmed = true;
              if($newuser->save())
              {
                 $userx = User::find($newuser->id);
                 Auth::login($userx);
                 if(Auth::check())
                 {
                     return Redirect::intended('/home');
                 }
              }
            
        }
    }
    public function getLoggedOut()
    {
       $hauth=new Hybrid_auth(app_path().'/config/fb_auth.php');
       $hauth->logoutAllProviders();
       return View::make('login');
    }
}