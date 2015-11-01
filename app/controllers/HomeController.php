<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function contact()
	{
		$fname = Input::get('fname');
		$lname = Input::get('lname');
		$email = Input::get('email');
		$msg = Input::get('message');
		Mail::send('emails.welcome',[],function($message){
			$message->to('eng.khaled.93@hotmail.com')->subject('Askify');
		});
		return View::make('hello')->with('message',$msg);
	}

}
