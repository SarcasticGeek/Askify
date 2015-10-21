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
		return static::where('solved','=',0)->orderBy('id','DESC')->paginate(4);
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
		return static::where('question', 'LIKE', '%'.$keyword.'%')->paginate(4);
	}
	

	public function tags()
	{
		return $this->belongsToMany('Tag')->withTimestamps();
	}

}

