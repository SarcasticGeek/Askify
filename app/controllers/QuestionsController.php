
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
		$question->user_id = Auth::user()->id;
		$question->answerer_id = 0;
		$question->solved = 0;
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
	public function get_your_Questions(){
		return View::make('home')
			->with('title','Your Qs')->with('username',Auth::user()->username)
			->with('questions',Question::your_questions());
	}

	public function get_view($id = null){
		return View::make('question')->with('title','View Question')->with('question',Question::find($id));
	}

	public function get_results($keyword)
	{
		return View::make('results')
			->with('title','Search results')
			->with('questions',Question::search($keyword));
	}
	public function post_search()
	{
		$keyword = Input::get('keyword');


		if(empty($keyword))
		{
			return Redirect::to('home')
				->with('message','No key entered please try  again');
		}
		//return View::make('results');
		return Redirect::route('results',$keyword);
		/*return Redirect::to('thanks');*/
	}

}
