<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Answer extends Eloquent{


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

}
