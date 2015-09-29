<?php
class Question extends User {
	public static $rules = array(
		'question' => 'required | min:10 | max:255',
		'solved' => 'in:0,1');


	//User Question Relation
	public function user(){
		return $this->belongs_to('User');
	}
}


?>