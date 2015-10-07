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
	protected $fillable = array('question', 'solved','user_id','answerer_id');

	public static $rules = array(
		'question' => 'required|min:10|max:255',
		'solved' => 'in:0,1'
		);

	public static function validate($data)
	{
		return Validator::make($data,static::$rules);
	}
	public  function user(){
		return $this->belongsTo('User','user_id');
	}
	public  function answers(){
		return $this->hasMany('Answer');
	}
	public  static function unsolved(){
		return static::where('solved','=',0)->orderBy('id','DESC')->paginate(3);
	}
	public static function your_questions(){
		return static::where('user_id','=',Auth::user()->id)->paginate(3);
	}
	public static function others_questions(){
		return static::where('user_id','!=',Auth::user()->id)->orderBy('solved','ASC')->paginate(2);
	}	
	public static function search($keyword){
		return static::where('question', 'LIKE', '%'.$keyword.'%')->paginate(3);
	}

}

