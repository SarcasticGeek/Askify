<?php
class QuestionsController extends BaseController{
	public $restful = true; 
	public function get_index() {
		return View::make('Questions.index');
	}
	public function post_create() {
	 $validation = Question::validate(Input::all());
		if($validation->passes()){
		$question = new Question;
		$question->question = Input::get('question');
		$question->user_id = Auth::user()->id;
		$question->answerer_id = 0;
		$question->solved = 0;
		if(Input::get('private')==null){
			$question->private = 0;
		}else{
			$question->private =Input::get('private');
		}
		$question->save();


			$notification = new Notification();
			$notification->user_id = Auth::user()->id;
			$notification->question_id = $question->id;
			$notification->is_read = 0;
			$notification->save();

		//$question->tags()->attach(Input::get('tags'));
		$tags = Input::get('tags');
		foreach($tags as $tag){
		    $question->tags()->attach($tag);
		}

		return Redirect::to('home') 
			-> with('message', 'Your Question Has Been Successfully Posted');
		}else {
			return Redirect::to('home')->with('message','Please ask a question.');
		}
		
	}
	public function get_view($id = null){
		return View::make('question')->with('title','View Question')->with('question',Question::find($id));
	}

	public function get_results($keyword)
	{

		// $modifier = substr($keyword,0,strpos($keyword,':'));
		// $key = substr($keyword,strpos($keyword,':')+1);
		// switch($modifier){
		// 	case 'username':
		// 		return View::make('results')
		// 		->with('title','Search By '.$modifier)
		// 		->with('questions',Question::searchUser($key))
		// 		->with('keyword',$key);
		// 		break;
		// 	case 'answer':
		// 					return View::make('results')
		// 		->with('title','Search By '.$modifier)
		// 		->with('answers',Answer::search($key))->with('keyword',$key);
		// 		break;
		// 	case 'question':
		// 					return View::make('results')
		// 		->with('title','Search By '.$modifier)
		// 		->with('questions',Question::search($key))->with('keyword',$key);
		// 		break;
		// 	case 'date':
		// 					return View::make('results')
		// 		->with('title','Search By '.$modifier)
		// 		->with('questions',Question::searchByDate($key))->with('keyword',$key);
		// 		break;
		// 	case 'tag':
		// 					return View::make('results')
		// 		->with('title','Search By '.$modifier)
		// 		->with('tags',Tag::search_tag($key))->with('keyword',$key);
		// 		break;
		// 	case 'before':
		// 		return View::make('results')
		// 		->with('title','Search By '.$modifier.$key)
		// 		->with('questions',Question::searchByDateBefore($key))->with('keyword',$key);
		// 		break;
		// 	case 'after':
		// 		return View::make('results')
		// 		->with('title','Search By '.$modifier.$key)
		// 		->with('questions',Question::searchByDateAfter($key))->with('keyword',$key);
		// 		break;					
		// 	case 'unsolved':
		// 		return View::make('results')
		// 		->with('title','Search By unsolved questions')
		// 		->with('questions',Question::unsolved())->with('keyword',$keyword);
			
		// 	default:
		// 		return View::make('results')->with('title','Search results')
		// 		->with('message','Please choose one of search fileds above')->with('keyword',$keyword);
		// }
		return View::make('results')->with('user_questions',Question::searchUser($keyword))
									->with('questions',Question::search($keyword))
									->with('unsolved_questions',Question::unsolved())
									->with('date_questions',Question::searchByDateBefore($keyword))
									->with('before_questions',Question::searchByDateBefore($keyword))
									->with('after_questions',Question::searchByDateAfter($keyword))
									->with('answers',Answer::search($keyword))
									->with('tags',Tag::search_tag($keyword));
		
	}

    public function get_results_q($keyword)
    {
    	

    }
	
	public function post_search()
	{
		$keyword = Input::get('keyword');


		if(empty($keyword))
		{
			return Redirect::to('home')
				->with('message','No key entered please try  again');
		}
		return Redirect::route('results',$keyword);
		

	}
	

	private function questionBelongsToCurrentUser($id){
		$question = Question::find($id);
		if($question->user_id == Auth::User()->id){
			return true ;
		} 
		return false;
	}
	public function show_my_questions(){
		return View::make('Questions.myQs')
			->with('title','My Questions')
			->with('questions',Question::your_questions());
	}
	public function get_others_questions(){
		return View::make('home')
			->with('title','Home')
			->with('questions',Question::others_questions())->with('tags',Tag::all());
	}
	
	public function get_edit ($id = NULL) {
		if(!$this->questionBelongsToCurrentUser($id)) {
			return Redirect::route('your_questions')->with('message','Invalid Question');
		}
        return View::make('Questions.edit')->with('title','Edit')->with('question',Question::find($id));  
	}

	public function post_update() {
		$id = Input::get('question_id');
		if(!$this->questionBelongsToCurrentUser($id)) {
			return Redirect::route('your_questions')->with('message','Invalid Question');
		}
		$validation = Question::validate(Input::all());//array(Input::get('question'),Input::get('solved')));
		if ($validation->passes()) {
Question::where('id', '=', $id)->update(array('question'=> Input::get('question'),'solved'=>Input::get('solved'),
				'private'=>Input::get('private')));			return Redirect::route('question',$id)->with('message','Your question has been updated');
		    }  
		else {
			return Redirect::route('edit_question',$id)->withErrors($validation);


		    }
	}
	
	public function get_delete ($id = NULL) {
		if(!$this->questionBelongsToCurrentUser($id)) {
			return Redirect::route('your_questions')->with('message','Invalid Question');
		}
		
        return View::make('Questions.delete')->with('question',Question::find($id));  
	}

	public function post_delete($id) {
		$f=Question::find($id);
		if($f){
			$f->delete();
			return Redirect::route('your_questions')->with('message','your question has been deleted');
		}  
		return Redirect::route('your_questions')->with('message','not found');;
		}
		

	//rana [img]
	/*
	public function post_create() {
	 $validation = Question::validate(Input::all());
		if($validation->passes()){
		$question = new Question;
		$question->question = Input::get('question');
		$question->image = Input::file('image');
		$question->user_id = Auth::user()->id;
		$question->answerer_id = 0;
		$question->solved = 0;
		$question->save();
		return Redirect::to('home') 
			-> with('message', 'Your Question Has Been Successfully Posted');
		}else {
			return Redirect::to('home')->with('message','Please ask a question.');
		}		
	}
	*/
}
