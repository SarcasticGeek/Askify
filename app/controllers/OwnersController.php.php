<?php

class OwnersController extends BaseController {
	public $restful = true;

	public function show_my_tags(){
		return View::make('owner.tags')
			->with('title','My Tags')
			->with('tags',Auth::User()->tags);
	}
	public function get_view_tag($id = null){
		return View::make('owner.tag')->with('title','View Tag')->with('tag',Tag::find($id));
	}

}


