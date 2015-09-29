<?php 

class QuestionsController extends BaseController{


	// ??
	//public function get_index() {
	//	return View::make('question.index')
	//		->with('title', 'Askify - Home');
	//}

	//no one can create quesiton before being logged in 
	public function __construct(){
		$this->filter('before', 'auth.basic')
			->only(array('create'));
	}

	public function post_create() {
		//hyfhm mnen en $rules ele f Question model, hya d fn validate?
		$validation = Question::validate(Input::all());

		if($validation->passes())
		{
			// save question in db
			Question::create(array(
				'question' => Input::get('question'),
				'user_id' => Auth::user()->id
				// check user_id mktoba ezay
			));

			return Redirect::route('Home') 
				-> with('message', 'Your question has been successfully posted')
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