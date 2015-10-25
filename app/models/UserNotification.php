<?php



class Usernotification extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notifications_user';
	protected $fillable = array('user_id','question_id','answer_id','is_read');
	

	public function user()
    {
        return $this->belongsTo('User');
    }
    public function question(){
        return $this->belongsTo('Question');
    }

    public function answer(){
    	return $this->belongsTo('Answer');
    }

    public  static function unread(){
        return static::where('is_read','=',0)->orderBy('id','DESC')->paginate(4);
    }

    public  static function read(){
        return static::where('is_read','=',1)->orderBy('id','DESC')->paginate(4);
    }
}

