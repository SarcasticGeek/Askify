
<?php 

class QuestionsController extends BaseController{

	public $restful = true;

	public function get_index() {
		return View::make('Questions.index');
	}

	//no one can create quesiton before being logged in 
	/*public function __construct(){
		$this->filter('before'=>'auth.basic')
			->only(array('create'));
	}*/

	public function post_create() {

		$question = new Question;
		$question->question = Input::get('question');
		$question->user_id = Auth::user()->id;
		$question->answerer_id = 0;
		$question->solved = 0;
		$question->save();

		//return 'Your question has been successfully posted';
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
