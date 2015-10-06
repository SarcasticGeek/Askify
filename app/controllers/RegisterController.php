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
					$user->save();
					if(Auth::attempt($credit,true)){
						return Redirect::intended('/home');
						}
					}
				else if(Input::get('password') != Input::get('conpassword'))
					return Redirect::to('/register')->withInput()->with('signuperror','Password and confirm Password doesn\'t match');
			}
		}
	}
}