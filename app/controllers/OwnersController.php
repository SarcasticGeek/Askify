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
	public function post_new_tag(){
		$validation = Tag::validate(Input::all());
		if($validation->passes()){
			Tag::create(array(
				'name'=> Input::get('name'),
				'user_id'=>Auth::user()->id,
				));
			
			
			return Redirect::route('tags')->with('message',"You have created a tag");
		}else {
			return Redirect::route('tags')->withErrors($validation)->withInput();
		}
	}

	

}


