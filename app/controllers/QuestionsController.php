<?php 

class QuestionsController extends BaseController{

	public $restful = true; // to create controller that manages photos
	// to make actions respond to http verbs


	public function get_index() {
		return View::make('Questions.index');
	}

	//no one can create quesiton before being logged in 
	/*public function __construct(){
		$this->filter('before', 'auth.basic')
			->only(array('create'));
	}*/

	public function post_create() {

		$question = new Question;
		$question->question = Input::get('question');
		$question->username = Auth::user()->username;
		$question->save();
		
		/*Question::create(array(
				'question' => Input::get('question'),
				'id' => Auth::user()->id
			));
			*/

			return Redirect::to('home') 
				-> with('message', 'Your Question Has Been Successfully Posted');
		

		/*$validation = Question::validate(Input::all());
		if($validation->passes())
		{
			// save question in db
			Question::create(array(
				'question' => Input::get('question'),
				'id' => Auth::user()->id
			));

			return Redirect::route('Home') 
				-> with('message', 'Your question has been successfully posted');
		}
		else
		{
			// nfs l page bs hwareh l errors
			return Redirect::route('Home') -> withErrors($validation)
			 -> withInput();
		}*/
	}
}

?>