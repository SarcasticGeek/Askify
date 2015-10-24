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
			$internaldata['“question_tag'] = $tagsname;
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

}
