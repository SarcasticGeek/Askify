<?php

class ReportController extends BaseController{

	public function showReport(){
		return View::make('report');
	}

	public function doReport(){
		$report = new Report;
		$username =Request::segment(3);
		$user = User::where('username','=',$username)->get()->first();
		$report->user_id = $user->id;
		$report->owner_id = Auth::user()->id;
		$report->reason = Input::get('reason');
		$report->question_id = Request::segment(4);
		$report->save();
		return Redirect::to('/home');
	}
}