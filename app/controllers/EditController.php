<?php

class EditController extends BaseController{

	public function showEdit()
	{
		return View::make('edit');

	}

	public function doEdit()
	{
		//get the user id
		$id = Auth::user()->id;
		if(Input::get('password')=== Input::get('confirm_password'))
		{
		DB::table('users')->where('id', $id)->update(array('username'=>Input::get('username'),'email' => Input::get('email'),'password'=>Hash::make(Input::get('password'))));
		return Redirect::to('edit')->with('message', 'update done');
		}
		else
		{
			return Redirect::to('edit')->with('message', 'password not match');

		}
	
	}
	
}