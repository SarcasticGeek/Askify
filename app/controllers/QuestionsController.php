<?php 

class QuestionsController extends BaseController{

	public $restful = true; // to create controller that manages photos
	// to make actions respond to http verbs


	public function get_index() {
		return View::make('Questions.index')
			->with('title', 'Askify - Home');
	}

	//no one can create quesiton before being logged in 
	/*public function __construct(){
		$this->filter('before', 'auth.basic')
			->only(array('create'));
	}*/

	public function post_create() {
		$validation = Question::validate(Input::all());

		if($validation->passes())
		{
			// save question in db
			Question::create(array(
				'question' => Input::get('question'),
				'id' => Auth::user()->id
				// check user_id mktoba ezay
			));

			return Redirect::route('Home') 
				-> with('message', 'Your question has been successfully posted');
		}
		else
		{
			// nfs l page bs hwareh l errors
			return Redirect::route('Home') -> withErrors($validation)
			 -> withInput();
		}
	}
}

?>