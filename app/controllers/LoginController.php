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
        $flag_confirmed = false;
        $users = DB::table('users')->get();
        $username = Input::get('username');
        $message = '';
        $found = false;
		if($validator->fails()){
			return Redirect::to('login')->withInput()->withErrors($validator);
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
			if(Auth::attempt($credit,true)){

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