<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	public $timestamps="false";

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('username','email', 'password', 'password_confirmation');
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
		'username' => 'required|unique:users|alpha_dash|min:4',
		'password' => 'required|alpha_dash|between:4,8|confirmed',
		'email' => 'required|email',
		'password_confirmation' => 'required|alpha_dash|between:4,8'
		);

	public static function validate($data)
	{
		return Validator::make($data,static::$rules);
	}
	public function questions(){
		return $this->hasMany('Question');
	}
	
	public function answers(){
		return $this->hasMany('Answer');
	}
	public function tags()
	{
		return $this->belongsToMany('Tag');
	}

}
