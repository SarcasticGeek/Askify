<?php
class RegisterController extends BaseController{

	public function showRegister(){
		if(Auth::check()){
 		return Redirect::Route('others_questions');
 		}
		return View::make('register');
	}

	public function doRegister()
	{
		$credit = Input::only('username','email','password','conpassword');
		$creditx = Input::only('username','password');
		$validator = Validator::make($credit,
		array('username'=>'required','email'=>'required|email',
		'password'=>'required','conpassword'=>'required'));
		$user_flag = 0;
        $activation_code = str_random(60);
		$users = (array)DB::table('users')->get();
		$message = '';
		foreach ($users as $user)
		{
			if($user->username == Input::get('username'))
				{
					$user_flag = 1;
					$message = $user->username;
				}
			else if($user->email == Input::get('email'))
				{
					$user_flag = 1;
					$message = $user->email;
				}
		}
		if($user_flag == 1)
		{
			$user_flag = 0;
			return Redirect::to('/register')->withInput()->with('signuperror',$message.' already exists');
		}
		else
		{
			if($validator->fails()){
				return Redirect::to('register')->withInput()->withErrors($validator);
			}
			
			else{
				if(Input::get('password') == Input::get('conpassword')){
					$user = new User;
					$user->email=Input::get('email');
					$user->username=Input::get('username');
					$user->password=Hash::make(Input::get('password'));
                    $user->confirmationcode = $activation_code;
                    $user->confirmed = false;
					if($user->save())
                    {
                        Mail::queue('emails.activateAccount', array(
                            'name' => $user->username,
                            'code' => $activation_code), function($message) use ($user) {
                            $message->to(Input::get('email'), 'Please activate your account.')->subject('Askify Mail Verification');});
                        return View::make('thanksconf');
                    }
					}
				else if(Input::get('password') != Input::get('conpassword'))
					return Redirect::to('/register')->withInput()->with('signuperror','Password and confirm Password doesn\'t match');
			}
		}
	}
}