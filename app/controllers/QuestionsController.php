
<?php 


use League\Flysystem\Dropbox\DropboxAdapter;
use League\Flysystem\Filesystem;
use Dropbox\Client;


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
		$question->save();
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
			->with('questions',Question::others_questions());
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
			Question::where('id', '=', $id)->update(array('question'=> Input::get('question'),'solved'=>Input::get('solved')));
				return Redirect::route('question',$id)->with('message','Your question has been updated');
		            }  
		            else {
		            	return Redirect::route('edit_question',$id)->withErrors($validation);

		            }
	}

	//rana [img]
	public function get_image(){
		return View::make('upload')->with('title','Upload Image');
	}

	/*public function post_uploadToDropbox(){
		$connection = new DropboxStorageRepository;
		$filesystem = $connection->getConnection();
		$file = Input::file('image');
		$filesystem->put($file->getClientOriginalName(), File::get('file'));
		return Redirect::to('upload')->with('message','Image Uploaded Successfully!');
	}*/
	
	public function post_uploadToDropbox(){
		$connection = new DropboxStorageRepository;
		$filesystem = $connection->getConnection();
		$file = Input::get('http://limeblast.co.uk/wp-content/uploads/2013/07/laravel___ignited_by_rafdesign-d53afsw-632x316-1373977453.jpg');
		$filesystem->put('Laravel', 'http://limeblast.co.uk/wp-content/uploads/2013/07/laravel___ignited_by_rafdesign-d53afsw-632x316-1373977453.jpg');
		return Redirect::to('upload')->with('message','Image Uploaded Successfully!');
	}

}


class DropboxStorageRepository{

    protected $client;
    protected $adapter;
    public function __construct()
    {
        $this->client = new Client('accessTokenaccessTokenaccessToken', 'TestTest', null);
        $this->adapter = new DropboxAdapter($this->client);
    }
    public function getConnection()
    {
        return new Filesystem($this->adapter);
    }
}