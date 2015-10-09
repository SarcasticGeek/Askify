<?php

class AnswersController extends BaseController {
	public $restful = true;
	public function post_answer(){
		$validation = Answer::validate(Input::all());
		$question_id = Input::get('question_id');
		if($validation->passes()){
			Answer::create(array(
				'answer'=> Input::get('answer'),
				'user_id'=>Auth::user()->id,
				'question_id' => $question_id
				));
			//rana
			$question = Question::find($question_id);
			$question->solved = '1';
			$question->save();
			//
			return Redirect::route('question',$question_id)->with('message',"Thanks for your Answer");
		}else {
			return Redirect::route('question',$question_id)->withErrors($validation)->withInput();
		}
	}
	private function  answer_belongs_to_user($id){
		$answer = Answer::find($id);
		if($answer->user_id == Auth::user()->id){
			return true ;
		} 
		return false;
	}
	public function get_edit($id =NULL){
		$question_id = Question::find(Answer::find($id)->question_id)->id;
		if(!$this->answer_belongs_to_user($id)){
			return Redirect::route('question',$question_id)->with('message',"Invalid");
		}
		return View::make('answers.edit')->with('title','Edit Answer')->with('answer',Answer::find($id))->with('question',Question::find(Answer::find($id)->question_id));
	}
	public function post_update(){
		$id = Input::get('answer_id');
		$question_id = Input::get('question_id');
		if(!$this->answer_belongs_to_user($id)){
			return Redirect::route('question',$question_id)->with('message',"Invalid");
		}
		$validation = Answer::validate(Input::all());
		if($validation->passes()){
			Answer::where('id', '=', $id)->update(array(
				'answer'=> Input::get('answer')));
			
			return Redirect::route('question',$question_id)->with('message',"Updates!");
		}else {
			return Redirect::route('edit_answer',$id)->withErrors($validation)->withInput();
		}
	}
}


