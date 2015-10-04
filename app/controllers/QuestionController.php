<?php



class QuestionController extends BaseController{
	public $restful = true;
	public function Ask ()  {
	
		return View::make('questions');
	}

	public function Take ()  {
		$Q = new Question;
		$Q->title = Input::get('title');
		$Q->body = Input::get('body');
		//$Q->username = Auth::user()->username;
		$Q->save();
		return 'Your question sucess';
	}
}