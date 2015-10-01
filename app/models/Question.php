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
	protected $table = 'Questions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function search() {

		$keyword = Input::get('keyword');

		$searchTerms = explode(' ', $keyword);

		$query = DB::table('Questions');

		foreach($searchTerms as $term)
		{
			$query->where('question', 'LIKE', '%'. $keyword .'%');
		}

		$results = $query->get();

	}
}
