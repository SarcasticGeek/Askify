<?php 

class QuestionsController extends BaseController{


	// ??
	//public function get_index() {
	//	return View::make('question.index')
	//		->with('title', 'Askify - Home');
	//}

	public function post_create() {
		$validation = Question::validate(Input::all());

		if($validation->passes())
		{
			
		}
		else
		{
			// nfs l page bs hwareh l errors
			return Redirect::route('Home') -> withErrors($validation) -> withInput();
		}
	}
}

?>