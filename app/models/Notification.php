<?php

class Notification extends Eloquent
{

    public function user()
    {
        return $this->belongsTo('User');
    }
    public function question(){
        return $this->belongsTo('Question');
    }

    public  static function unread(){
        return static::where('is_read','=',0)->orderBy('id','DESC')->paginate(4);
    }

    public  static function read(){
        return static::where('is_read','=',1)->orderBy('id','DESC')->paginate(4);
    }



}