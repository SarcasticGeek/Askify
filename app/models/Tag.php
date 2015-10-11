<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Tag extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';
	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name','user_id');
	public static $rules = array(
		'name' => 'required|alpha_dash|between:4,128'
		);

	public static function validate($data)
	{
		return Validator::make($data,static::$rules);
	}
	public function questions()
	{
		return $this->belongsToMany('Question');
	}
	public function user()
	{
		return $this->belongsTo('User');
	}
	
public static function search_tag($keyword){
		return static::where('name', 'LIKE', '%'.$keyword.'%')->paginate(3);
	}
}

