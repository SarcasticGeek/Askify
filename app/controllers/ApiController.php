<?php

class ApiController extends BaseController {

	public $restful = true;
	public function getQsByUserId($user_id){
		/*
		{my_questions:[
	{”question:   ”,”Answer:   ”,”question_date:     ”,”Answer_date:     ”, “question_tag:    ”,”question_id:    ”}
]} 
		*/
		$user = User::find($user_id);
		$data = [];
		$questions = Question::where('user_id','=',$user->id)->get();
		foreach ($questions as $question ) {
			$internaldata = [];
			$internaldata['question'] = $question->question;
			$internaldata['question_date'] = $question->updated_at->diffForHumans();
			if($question->solved == 1){
				foreach ($question->answers as $answer) {
					$internaldata['Answer'] = $answer->answer;
					$internaldata['Answer_date'] = $answer->updated_at->diffForHumans();
				}
			}else{
				$internaldata['Answer']  = "No Answer";
				$internaldata['Answer_date'] = 0;
			}
			//tags
			$tagsname = [];
			foreach ($question->tags as $tag) {
				array_push($tagsname, $tag->name);
			}
			$internaldata['question_tag'] = $tagsname;
			$internaldata['question_id'] = $question->id;
			array_push($data, $internaldata);	
		}
		return Response::json(array('error' => false,
			'my_questions'=>$data),
			200);
	}
	public function getAllQs(){
		/* 
		{question_List:[
	{“questioner_name:    ”,”question:   ”,”Answer:   ”,”question_date:     ”,”Answer_date:     ”, “question_tag:    ”}
]}
		*/
		$data = [];
		$questions = Question::all();
		foreach ($questions as $question ) {
			$internaldata = [];
			$internaldata['questioner_name'] = $question->user->username;
			$internaldata['question'] = $question->question;
			$internaldata['question_date'] = $question->updated_at->diffForHumans();
			if($question->solved == 1){
				foreach ($question->answers as $answer) {
					$internaldata['Answer'] = $answer->answer;
					$internaldata['Answer_date'] = $answer->updated_at->diffForHumans();
				}
			}else{
				$internaldata['Answer']  = "No Answer";
				$internaldata['Answer_date'] = 0;
			}
			//tags
			$tagsname = [];
			foreach ($question->tags as $tag) {
				array_push($tagsname, $tag->name);
			}
			$internaldata['question_tag'] = $tagsname;
			//$internaldata['question_id'] = $question->id;
			array_push($data, $internaldata);	
		}
		return Response::json(array('error' => false,
			'question_List'=>$data),
			200);
	}
	public function postQuestion(){
		/*
		url to send asked question to be saved in the db
---------------------------------------------------------------
i will send :
user_id
question

receive:
1 >> if the question is saved
0 >> if not saved 
		*/
		$validation = Question::validate(Input::all());
		if($validation->passes()){
			$question = new Question;
			$question->question = Input::get('question');
			$question->user_id = Input::get('user_id');
			$question->solved = 0;
			if(Input::get('private')==null){
				$question->private = 0;
			}else{
				$question->private =Input::get('private');
			}
			$question->save();
				$notification = new Notification();
				$notification->user_id = Input::get('user_id');
				$notification->question_id = $question->id;
				$notification->is_read = 0;
				$notification->save();
			// $tags = Input::get('tags');
			// foreach($tags as $tag){
			//     $question->tags()->attach($tag);
			// }
			 return Response::json(array('error' => false,
				'message'=>'Your Question Has Been Successfully Posted'),
				200);
		
		}else {
			 return Response::json(array('error' => true,
				'message'=>'Errors on validations'),
				200);
		}
		
	}
	private function questionBelongsToCurrentUser($idOfQ,$idOfUser){
		$question = Question::find($idOfQ);
		if($question->user_id == $idOfUser){
			return true ;
		} 
		return false;
	}
	public function editQuestion(){
		$id = Input::get('question_id');
		$userid = Input::get('user_id');
		if(!$this->questionBelongsToCurrentUser($id,$userid)) {
			return Response::json(array('error' => true,
				'message'=>'Not your Question to Edit'),
				200);
		}
		$validation = Question::validate(Input::all());//array(Input::get('question'),Input::get('solved')));
		if ($validation->passes()) {
		Question::where('id', '=', $id)->update(array('question'=> Input::get('question'),'solved'=>Input::get('solved'),'private'=>Input::get('private')));
			 return Response::json(array('error' => false,
				'message'=>'Your Question Has Been Successfully updated'),
				200);
		    }  
		else {
			 return Response::json(array('error' => true,
				'message'=>'Errors on validations'),
				200);
		    }
	}
	public function deleteQuestion(){
		$question_id = Input::get('question_id');
		$f=Question::find($question_id);
		if(isset($f)){
			$f->delete();
			 return Response::json(array('error' => false,
				'message'=>'Your Question Has Been Successfully deleted'),
				200);
		}  else{
		 return Response::json(array('error' => true,
				'message'=>'not found'),
				200);
		}
	}
	public function error404(){
		 return Response::json(array('error' => true,
				'message'=>'404 not found'),
				404);
	}
	public function searchUser($keyword = null){
		 $users = User::where('username','LIKE','%'.$keyword.'%')->get();
		 $data = [];
		foreach ($users as $user ) {	
			$questions = $user->questions;
			foreach ($questions as $question ) {
				$internaldata = [];
				$internaldata['questioner_name'] = $question->user->username;
				$internaldata['question'] = $question->question;
				$internaldata['question_date'] = $question->updated_at->diffForHumans();
				if($question->solved == 1){
					foreach ($question->answers as $answer) {
						$internaldata['Answer'] = $answer->answer;
						$internaldata['Answer_date'] = $answer->updated_at->diffForHumans();
					}
				}else{
					$internaldata['Answer']  = "No Answer";
					$internaldata['Answer_date'] = 0;
				}
				//tags
				$tagsname = [];
				foreach ($question->tags as $tag) {
					array_push($tagsname, $tag->name);
				}
				$internaldata['question_tag'] = $tagsname;
				//$internaldata['question_id'] = $question->id;
				array_push($data, $internaldata);	
			}
		}
		return Response::json(array('error' => false,
			'question_List'=>$data),
			200);
	}
	public function searchQuestion($keyword = null){
		$questions = Question::where('question','LIKE','%'.$keyword.'%')->get();
		$data = [];
		foreach ($questions as $question ) {
			$internaldata = [];
			$internaldata['questioner_name'] = $question->user->username;
			$internaldata['question'] = $question->question;
			$internaldata['question_date'] = $question->updated_at->diffForHumans();
			if($question->solved == 1){
				foreach ($question->answers as $answer) {
					$internaldata['Answer'] = $answer->answer;
					$internaldata['Answer_date'] = $answer->updated_at->diffForHumans();
				}
			}else{
				$internaldata['Answer']  = "No Answer";
				$internaldata['Answer_date'] = 0;
			}
			//tags
			$tagsname = [];
			foreach ($question->tags as $tag) {
				array_push($tagsname, $tag->name);
			}
			$internaldata['question_tag'] = $tagsname;
			//$internaldata['question_id'] = $question->id;
			array_push($data, $internaldata);	
		}
		return Response::json(array('error' => false,
			'question_List'=>$data),
			200);
	}
	public function searchAnswer($keyword = null){
		$answers = Answer::where('answer','LIKE','%'.$keyword.'%')->get();
		$data = [];
		foreach ($answers as $answer ) {
			$question = $answer->question;
				$internaldata = [];
				$internaldata['questioner_name'] = $question->user->username;
				$internaldata['question'] = $question->question;
				$internaldata['question_date'] = $question->updated_at->diffForHumans();
				if($question->solved == 1){
					foreach ($question->answers as $answer) {
						$internaldata['Answer'] = $answer->answer;
						$internaldata['Answer_date'] = $answer->updated_at->diffForHumans();
					}
				}else{
					$internaldata['Answer']  = "No Answer";
					$internaldata['Answer_date'] = 0;
				}
				//tags
				$tagsname = [];
				foreach ($question->tags as $tag) {
					array_push($tagsname, $tag->name);
				}
				$internaldata['question_tag'] = $tagsname;
				//$internaldata['question_id'] = $question->id;
				array_push($data, $internaldata);	
		}
		return Response::json(array('error' => false,
			'question_List'=>$data),
			200);
	}
	public function searchTag($keyword = null){
		$tags = Tag::where('name','LIKE','%'.$keyword.'%')->get();
		$data = [];
		foreach ($tags as $tag ) {		
			$questions = $tag->questions;
			foreach ($questions as $question ) {
				$internaldata = [];
				$internaldata['questioner_name'] = $question->user->username;
				$internaldata['question'] = $question->question;
				$internaldata['question_date'] = $question->updated_at->diffForHumans();
				if($question->solved == 1){
					foreach ($question->answers as $answer) {
						$internaldata['Answer'] = $answer->answer;
						$internaldata['Answer_date'] = $answer->updated_at->diffForHumans();
					}
				}else{
					$internaldata['Answer']  = "No Answer";
					$internaldata['Answer_date'] = 0;
				}
				//tags
				$tagsname = [];
				foreach ($question->tags as $tag) {
					array_push($tagsname, $tag->name);
				}
				$internaldata['question_tag'] = $tagsname;
				//$internaldata['question_id'] = $question->id;
				array_push($data, $internaldata);	
			}
		}
		return Response::json(array('error' => false,
			'question_List'=>$data),
			200);
	}
	public function searchUnsolved($keyword = null){
		$questions = Question::where('question','LIKE','%'.$keyword.'%')->where('solved','=',0)->get();
		$data = [];
		foreach ($questions as $question ) {
			$internaldata = [];
			$internaldata['questioner_name'] = $question->user->username;
			$internaldata['question'] = $question->question;
			$internaldata['question_date'] = $question->updated_at->diffForHumans();
			if($question->solved == 1){
				foreach ($question->answers as $answer) {
					$internaldata['Answer'] = $answer->answer;
					$internaldata['Answer_date'] = $answer->updated_at->diffForHumans();
				}
			}else{
				$internaldata['Answer']  = "No Answer";
				$internaldata['Answer_date'] = 0;
			}
			//tags
			$tagsname = [];
			foreach ($question->tags as $tag) {
				array_push($tagsname, $tag->name);
			}
			$internaldata['question_tag'] = $tagsname;
			//$internaldata['question_id'] = $question->id;
			array_push($data, $internaldata);	
		}
		return Response::json(array('error' => false,
			'question_List'=>$data),
			200);
	}
	public function notificationsToUser(){
		$notifications = Notification::where('is_read','=',0)->get();
		$data = [];
		foreach ($notifications as $notification ) {
			$question = $notification->question;
				$internaldata = [];
				$internaldata['questioner_name'] = $question->user->username;
				$internaldata['question'] = $question->question;
				$internaldata['question_date'] = $question->updated_at->diffForHumans();
				if($question->solved == 1){
					foreach ($question->answers as $answer) {
						$internaldata['Answer'] = $answer->answer;
						$internaldata['Answer_date'] = $answer->updated_at->diffForHumans();
					}
				}else{
					$internaldata['Answer']  = "No Answer";
					$internaldata['Answer_date'] = 0;
				}
				//tags
				$tagsname = [];
				foreach ($question->tags as $tag) {
					array_push($tagsname, $tag->name);
				}
				$internaldata['question_tag'] = $tagsname;
				//$internaldata['question_id'] = $question->id;
				array_push($data, $internaldata);	
		}
		return Response::json(array('error' => false,
			'question_List'=>$data),
			200);
	}

}
