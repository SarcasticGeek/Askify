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
 Route::post('/',array('before'=>'csrf',
 	'uses'=>'QuestionsController@post_create'));


Route::get('/register','RegisterController@showRegister');
Route::post('/register','RegisterController@doRegister');

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


Route::get('/logout',array('as'=>'logout','uses'=>'LogoutController@doLogout'));


Route::post('/home','QuestionsController@post_create');
Route::get('/edit',array('as'=>'edit','uses'=>'EditController@showEdit'))->before('auth|banned');


Route::post('/edit',array('before'=>'csrf',
 	'uses'=>'EditController@doEdit'));


Route::get('question/{num?}',array('as'=>'question','uses'=>'QuestionsController@get_view','before'=>'auth|banned'));


Route::get('results/{all?}', array( 'as' => 'results' ,'uses'=>'QuestionsController@get_results'));
Route::post('search', array('before'=>'csrf', 'uses'=>'QuestionsController@post_search'));


Route::get('your_questions',array('before' => 'auth|banned','as'=>'your_questions','uses'=>'QuestionsController@show_my_questions'));
//Routs of ziad
Route::get('question/{num?}/edit',array('as'=>'edit_question','uses'=>'QuestionsController@get_edit'));
Route::post('question/update',array('before' => 'auth','before'=>'csrf','uses'=>'QuestionsController@post_update'));
Route::get('question/pre/{id}',array('as'=>'delete_question','uses'=>'QuestionsController@get_delete'));
Route::get('question/delete/{id}',array('as'=>'after_delete_question','uses'=>'QuestionsController@post_delete'));

//Routes of answering
Route::post('answer',array('before' => 'auth','before'=>'ifAdmin','before'=>'csrf','uses'=>'AnswersController@post_answer'));
Route::get('answer/{num?}/edit',array('before' => 'auth','before'=>'ifAdmin','as'=>'edit_answer','uses'=>'AnswersController@get_edit'));
Route::post('answer/update',array('before' => 'auth','before'=>'ifAdmin','before'=>'csrf','uses'=>'AnswersController@post_update'));
Route::get('facebookauth/{auth?}',array('as'=>'facebookAuth','uses'=>'AuthController@getFacebookLogin'));
Route::get('/{confirmationCode}','ConfirmationController@confirmationState');
Route::post('/emailconf','ConfirmationController@postConfirmation');


Route::get('/home/notifications',array('before' => 'auth','before'=>'ifAdmin','after'=>'update','as'=>'notifications','uses'=>'AnswersController@show_notifications'));


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


Route::get('api/questionlist/all','ApiController@getAllQs');
Route::get('/api/questionlist/view/{user_id?}','ApiController@getQsByUserId');
