<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Question extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('question', 'solved','user_id','answerer_id','private');

	public static $rules = array(
		'question' => 'required|min:10|max:255|unique:questions',
		'solved' => 'in:0,1'
		);
	/* (rana [img])
	public static $rules = array(
		'question' => 'required|min:10|max:255',
		'solved' => 'in:0,1',
		'image' => 'mimes:jpg,jpeg,png|max:200px'
		);
	*/
	public static function validate($data)
	{
		return Validator::make($data,static::$rules);
	}

	public  function user(){
		return $this->belongsTo('User','user_id');
	}

	public function notification(){
		return $this->belongsTo('Notification');
	}
	public  function answers(){
		return $this->hasMany('Answer');
	}
	public  static function unsolved(){
		return static::where('solved','=',0)->orderBy('id','DESC')->paginate(25);
	}


	public static function your_questions(){
		return static::where('user_id','=',Auth::user()->id)->orderBy('solved','ASC')->paginate(4);
	}
	public static function others_questions(){
		return static::where('user_id','!=',Auth::user()->id)->orderBy('solved','ASC')->paginate(4);
	}

	///END OF CONFIGS

	/****** THAT"S BUILT FOR ASK>FM  APP NOT WITH SNAPPY APP
	public function answerer(){
		return $this->belongsTo('User','answerer_id');
	}
	public  function answer(){
		return $this->hasOne('Answer');
	}
	public static function your_questions(){
		return static::where('user_id','=',Auth::user()->id)->paginate(3);
	}
	public static function questionsNeedsYouranswer(){
		return static::where('answerer_id','=',Auth::user()->id)->where('solved','=',0)->paginate(3);
	}
	public static function questionsYouanswered(){
		return static::where('answerer_id','=',Auth::user()->id)->where('solved','=',1)->paginate(3);
	}
	***************************/	
	public static function search($keyword){
		Paginator::setPageName('page_questions');
		return static::where('question', 'LIKE', '%'.$keyword.'%')->paginate(4);
	}
	
    public static function searchUser($keyword){
        $ids = [];
        $users = User::where('username','LIKE','%'.$keyword.'%')->get();
        foreach($users as $user)
        {
            $id = $user->id;
            array_push($ids,$id);
        }
        Paginator::setPageName('page_userquestions');
		return static::whereIn('user_id', $ids)->paginate(4);
	}

	public function tags()
	{
		return $this->belongsToMany('Tag')->withTimestamps();
	}
	public static function searchByDate($keyword){
		$check = str_replace('-','',$keyword);

		Paginator::setPageName('page_date');
		if(is_numeric($check))return static::where('updated_at', 'LIKE', $keyword.'%')->paginate(4);
		else return static::where('updated_at','>','9998-01-01 00:00:00')->paginate(4);		
	}
	public static function searchByDateBefore($keyword)
	{
		$keywordx='';
		$lenght = strlen($keyword);
		if($lenght == 4)$keywordx =$keyword.'-01-01 00:00:00';
		else if($lenght ==7)$keywordx =$keyword.'-01 00:00:00';
		else $keywordx = $keyword.' 00:00:00';
		$check = str_replace('-','',$keyword);
		Paginator::setPageName('page_before');
		if(is_numeric($check))return static::where('updated_at','<', $keywordx)->paginate(4);
		else return static::where('updated_at','>','9998-01-01 00:00:00')->paginate(4);
	}
	public static function searchByDateAfter($keyword)
		{
			$keywordx='';
			$lenght = strlen($keyword);
		if($lenght == 4)$keywordx =$keyword.'-01-01 23:59:59';
		else if($lenght ==7)$keywordx =$keyword.'-01 23:59:59';
		else $keywordx = $keyword.' 23:59:59';
		$check = str_replace('-','',$keyword);
		Paginator::setPageName('page_after');
		if(is_numeric($check))return static::where('updated_at','>', $keywordx)->paginate(4);
		else return static::where('updated_at','>','9998-01-01 00:00:00')->paginate(4);
			
		}
    public static function askedMoreThan($keyword)
        {
        	$ids = [];
        	$questions = Question::all();
        	foreach($questions as $question)
        	{
        		$x = 0;
        		foreach($questions as $questionx)
        		{
        			if($question->user_id == $questionx->user_id) $x++;

        		}
        		if($x>intval($keyword))
        		{
        			$id = $question->user_id;
            		array_push($ids,$id);
        		}
           
        	}
			return static::whereIn('user_id', $ids)->paginate(25);
		}
		public static function askedLessThan($keyword)
        {
        	$ids = [];
        	$questions = Question::all();
        	foreach($questions as $question)
        	{
        		$x = 0;
        		foreach($questions as $questionx)
        		{
        			if($question->user_id == $questionx->user_id) $x++;
        		}
        		if($x<intval($keyword))
        		{
        			$id = $question->user_id;
            		array_push($ids,$id);
        		}
           
        	}
			return static::whereIn('user_id', $ids)->paginate(25);
		}
		public static function askedEqualto($keyword)
        {
        	$ids = [];
        	$questions = Question::all();
        	foreach($questions as $question)
        	{
        		$x = 0;
        		foreach($questions as $questionx)
        		{
        			if($question->user_id == $questionx->user_id) $x++;
        		}
           		if($x==intval($keyword))
        		{
        			$id = $question->user_id;
            		array_push($ids,$id);
        		}
        	}
			return static::whereIn('user_id', $ids)->paginate(25);
		}
		public  static function unsolvedquestions($keyword){
		Paginator::setPageName('page_unsolved');	
		return static::where('solved','=',0)->where('question', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(4);
	}
	}

