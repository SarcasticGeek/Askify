<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Question extends Eloquent{


	protected $fillable = array('question', 'solved','user_id');

	public static $rules = array(
		'question' => 'required|min:10|max:255',
		'solved' => 'in:0,1'
		);

	public static function validate($data)
	{
		return Validator::make($data,static::$rules);
	}
	public  function user(){
		return $this->belongsTo('User');
	}
	public function answerer_user(){
		return $this->hasOne('User');
	}
	public  function answer(){
		return $this->hasOne('Answer');
	}
	public  static function unanswered_questions(){
		return static::where('solved','=',0)->orderBy('id','DESC')->paginate(3);
	}
	public static function your_answers(){
		return static::where('user_id','=',Auth::user()->id)->paginate(3);
	}

}
