// Commented kolaha we kda 

<?php 

class QuestionsController extends BaseController{


	// ??
	public function get_index() {
		return View::make('question.index')
			->with('title', 'Askify - Home');
	}
}

?>