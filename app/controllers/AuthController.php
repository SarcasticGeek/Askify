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
                    DB::table('users')
                ->where('username', $userx->username)
                ->update(array('confirmationcode' => 'f'));
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
              Mail::queue('emails.facebookcredit', array(
                'name' => $username,
                'password' => $password), function($message) use ($newuser)
                          {
                            $message->to($newuser->email, 'Thanks for Signing in Askify using facebook here is your login credientials')->subject('Askify login Credientials');});
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
 public function loginWithGoogle($auth = NULL)
    {
        if($auth =='auth')
        {
            try
            {
                Hybrid_Endpoint::process();
            }
            catch(Exception $e)
            {
                return Redirect::route('authViaGoogle');
            }
            return;
        }
        $oauth = new Hybrid_Auth(app_path().'/config/google_auth.php');
     
        $provider = $oauth->authenticate('Google');
     
        $profile = $provider->getUserProfile();
       
        $email = $profile->email;
        $username = $profile->displayName;
        $found = false;
        $users = DB::table('users')->get();
        foreach ($users as $user)
    {
      if($user->email == $email)
            {
                $userx =  DB::table('users')->where('email', $email);
                $userx = User::find($user->id);
                Auth::login($userx);
                if(Auth::check())
                 {
                    DB::table('users')->where('username', $userx->username)->update(array('confirmationcode' => 'google'));
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
              $newuser->confirmationcode = 'google';
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
  }