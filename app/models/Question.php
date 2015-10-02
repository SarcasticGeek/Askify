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
	//protected $table = 'Questions';
	protected $table = 'questions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $fillable = array('question', 'solved','user_id','answerer_id');
	//men el 7agat d ??

	public static $rules = array(
		'question' => 'required | min:10 | max:255',
		'solved' => 'in:0,1');

	public static function validate($data)
	{
		return Validator::make($data,static::$rules);
	}
	public  function user(){
		return $this->belongsTo('User','user_id');
	}
	public function answerer(){
		return $this->belongsTo('User','answerer_id');
	}
	public  function answer(){
		return $this->hasOne('Answer');
	}
	public static function questionsNeedsYouranswer(){
		return static::where('answerer_id','=',Auth::user()->id)->where('solved','=',0)->paginate(3);
	}
	public static function questionsYouanswered(){
		return static::where('answerer_id','=',Auth::user()->id)->where('solved','=',1)->paginate(3);
	}


}
