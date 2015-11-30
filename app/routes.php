<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',function(){
 	if(Auth::check()){
 		return Redirect::Route('others_questions');
 	}
 	return View::make('hello');
 });
Route::get('/hello',function(){
    return View::make('hello');
});

Route::post('/contact','HomeController@contact');

 Route::post('/',array('before'=>'csrf',
 	'uses'=>'QuestionsController@post_create'));


 Route::post('/hello',array('as'=>'hello','uses'=>'RegisterController@checkUsername'));
 Route::post('/hell',array('as'=>'hell','uses'=>'RegisterController@checkemail'));
 Route::post('/helloo','LoginController@checkActivate');

Route::get('/register','RegisterController@showRegister');
Route::post('/register-user',array('uses'=>'RegisterController@doRegister'));

Route::get('/login','LoginController@showLogin');
Route::post('/login','LoginController@doLogin');
Route::any('/captcha-test', function()
    {

        if (Request::getMethod() == 'POST')
        {
            $rules =  array('captcha' => array('required', 'captcha'));
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            }
            else
            {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            }
        }

        $content = Form::open(array(URL::to(Request::segment(1))));
        $content .= '<p>' . HTML::image(Captcha::img(), 'Captcha image') . '</p>';
        $content .= '<p>' . Form::text('captcha') . '</p>';
        $content .= '<p>' . Form::submit('Check') . '</p>';
        $content .= '<p>' . Form::close() . '</p>';
        return $content;

    });

Route::get('/home',array('before' => array('auth','banned'),'as'=>'others_questions','uses'=>'QuestionsController@get_others_questions'));
/*================== the ajax routed will be here====================*/
Route::get('/home/all',function(){

    $questions=Question::others_questions();
    return View::make('all',['questions'=>$questions])->render();

});
Route::get('/home/date',function(){

    $orederd_questions=Question::orderd_by_date();
    return View::make('date',['orederd_questions'=>$orederd_questions])->render();

});
Route::get('/home/solved',function(){

    $solved_questions=Question::solved_only();
    return View::make('answered',['solved_questions'=>$solved_questions])->render();

});

Route::get('/logout',array('as'=>'logout','uses'=>'LogoutController@doLogout'));


Route::post('/home','QuestionsController@post_create');
Route::get('/edit',array('as'=>'edit','uses'=>'EditController@showEdit'))->before('auth|banned');


Route::post('/edit',array('before'=>'csrf',
 	'uses'=>'EditController@doEdit'));


Route::get('question/{num?}',array('as'=>'question','uses'=>'QuestionsController@get_view','before'=>'auth|banned'));


Route::get('results/{all?}', array( 'as' => 'results' ,'uses'=>'QuestionsController@get_results'));
Route::post('search', array('before'=>'csrf', 'uses'=>'QuestionsController@post_search'));
Route::post('results/{all?}',array('as' =>'results','uses'=>'QuestionsController@ajaxfunction'));


Route::get('your_questions',array('before' => 'auth|banned','as'=>'your_questions','uses'=>'QuestionsController@show_my_questions'));
//Routs of ziad
Route::get('question/{num?}/edit',array('as'=>'edit_question','uses'=>'QuestionsController@get_edit'));
Route::post('question/update',array('before' => 'auth','before'=>'csrf','uses'=>'QuestionsController@post_update'));
Route::get('question/pre/{id}',array('as'=>'delete_question','uses'=>'QuestionsController@get_delete'));
Route::get('question/delete/{id}',array('as'=>'after_delete_question','uses'=>'QuestionsController@post_delete'));

//Routes of answering
Route::post('answer',array('before' => 'auth','before'=>'ifAdmin','before'=>'csrf','uses'=>'AnswersController@post_answer'));

//
//Route::post('/home',array('before' => 'auth','before'=>'ifAdmin','before'=>'csrf','uses'=>'AnswersController@post_answer'));


Route::get('answer/{num?}/edit',array('before' => 'auth','before'=>'ifAdmin','as'=>'edit_answer','uses'=>'AnswersController@get_edit'));
Route::post('answer/update',array('before' => 'auth','before'=>'ifAdmin','before'=>'csrf','uses'=>'AnswersController@post_update'));
Route::get('facebookauth/{auth?}',array('as'=>'facebookAuth','uses'=>'AuthController@getFacebookLogin'));
Route::get('/{confirmationCode}','ConfirmationController@confirmationState');
Route::post('/emailconf','ConfirmationController@postConfirmation');


Route::get('/home/notifications',array('before' => 'auth','before'=>'ifAdmin','after'=>'update','as'=>'notifications','uses'=>'AnswersController@show_notifications'));
Route::get('/home/answernotify',array('after'=>'updateusernotification',function(){
    return View::make('UserNotification');
}));

//Routes of Report
Route::get('/home/report/{username}/{question}',array('as'=>'home/report','before'=>'ifAdmin','uses'=>'ReportController@showReport'));
Route::post('/home/report/{username}/{question}','ReportController@doReport');
Route::get('user/banned',array('as'=>'user/banned','uses'=>'ReportController@showBanned'));


//Routs of Owner
Route::get('owner/tags',array('as'=>'tags','before' => 'auth','before'=>'ifAdmin','uses'=>'OwnersController@show_my_tags'));
Route::get('owner/tag/{num?}',array('as'=>'tag','before' => 'auth','before'=>'ifAdmin','uses'=>'OwnersController@get_view_tag'));
Route::post('owner/tag/new',array('before' => 'auth','before'=>'csrf','before'=>'ifAdmin','uses'=>'OwnersController@post_new_tag'));

//Login by google
Route::get('auth/ViaGoogle/{auth?}',array('as'=>'authViaGoogle','uses'=>'AuthController@loginWithGoogle'));


//ajax checks
Route::get('home/Tagsajax','QuestionsController@getalltags');
//API
Route::get('api/questionlist/all','ApiController@getAllQs');
Route::get('/api/questionlist/view/{user_id?}','ApiController@getQsByUserId');
//Route::post('/api/question/{question_id?}/delete','ApiController@deleteQuestion');
Route::post('/api/question/create','ApiController@postQuestion');
Route::post('/api/question/edit','ApiController@editQuestion');
Route::post('/api/question/delete','ApiController@deleteQuestion');
Route::get('/api/question/create','ApiController@error404');
Route::get('/api/question/edit','ApiController@error404');
Route::get('/api/question/delete','ApiController@error404');
Route::get('/api/search/user/{keyword?}','ApiController@searchUser');
Route::get('/api/search/question/{keyword?}','ApiController@searchQuestion');
Route::get('/api/search/answer/{keyword?}','ApiController@searchAnswer');
Route::get('/api/search/tag/{keyword?}','ApiController@searchTag');
Route::get('/api/search/unsolved/{keyword?}','ApiController@searchUnsolved');
Route::get('/api/notificationsToUser/{userid?}','ApiController@notificationsToUser');
Route::get('/api/user/login','ApiController@doLogin');
Route::post('/api/user/signup','ApiController@doSignUp');
Route::get('/api/search/all/{keyword?}','ApiController@searchAll');
