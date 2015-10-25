<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Answer extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'answers';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('question_id', 'answer','user_id');

	public static $rules = array(
		'answer' => 'required|min:2|max:255'
		);

	public static function validate($data)
	{
		return Validator::make($data,static::$rules);
	}
	public function user(){
		return $this->belongsTo('User');
	}
	public function question(){
		return $this->belongsTo('Question');
	}
	public static function ifAdmin(){
		return static::where('user_id','=',Auth::user()->id)->first()->ifAdmin;
	} 
	public static function your_answers(){
		return static::where('user_id','=',Auth::user()->id)->paginate(3);
	}
	public static function others_answers(){
		return static::where('user_id','!=',Auth::user()->id)->paginate(3);
	}

	public static function search($keyword){
		Paginator::setPageName('page_answers');
		return static::where('answer', 'LIKE', '%'.$keyword.'%')->paginate(4);
	}
	
	
}
