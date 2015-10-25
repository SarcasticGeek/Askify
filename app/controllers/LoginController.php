<?php

class LoginController extends BaseController{

	public function showLogin(){
		if(Auth::check()){
 		return Redirect::Route('others_questions');
 		}
		return View::make('login');
	}

    public function checkActivate(){
        $user = Input::get('user');
        $pass = Input::get('pass');
        if(Auth::attempt(array('username'=>$user,'password'=>$pass))){
        $confirm = User::where('username',$user)->get()->first()->confirmed;
        if($confirm==1){
            return 'Activated';
        }else{
            Auth::logout();
            return 'Not';
        }            
        }
        return 'Error';  
    }


	public function doLogin(){
		$credit = Input::only('username-signin','password-signin');
		$validator = Validator::make($credit,array('username-signin'=>'required','password-signin'=>'required'));
        $flag_confirmed = false;
        $users = DB::table('users')->get();
        $username = Input::get('username-signin');
        $message = '';
        $found = false;
		if($validator->fails()){
            //Will not happen because of HTML5 Validation
		}
		else{
            foreach ($users as $user)
		      {
                $message = $message.$user->username.$user->confirmed;
			     if($user->username == $username)
                 {
                     $message = $user->username;   
                     if($user->confirmed == true)
                     {
                         $flag_confirmed = true;
                         //$message = $message.'confirmed';
                     }
                     //else if(!$user->confirmed)
                         //$message = $message.'not confirmed';
                 }
              }


        if($flag_confirmed == true)
        {
			if(Auth::attempt(array('username'=>Input::get('username-signin'),'password'=>Input::get('password-signin')),true)){
                DB::table('users')
                ->where('username', $username)
                ->update(array('confirmationcode' => ''));

                 //Check if the user is banned
              $user_id = User::where('username',$username)->get()->first()->id;
              $banned = Report::where('user_id',$user_id)->get()->first();

              if($banned!=null){
                setcookie('banned','1',time()-(86400*30)); //86400 = 1 day
                return Redirect::to('user/banned');
              }


			return Redirect::intended('/home');
			}
        }
            
            else if (Auth::validate($credit) && $flag_confirmed == false){
                return Redirect::to('/login')->withInput()->with('loginerror', 'Account not activated');
            }
            
		        return Redirect::to('/login')->withInput()->with('loginerror','Username Or Password Is Incorrect');
		}
	}
}