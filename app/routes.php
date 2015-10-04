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

Route::get('/',function(){return View::make('hello');});
Route::get('/register','RegisterController@showRegister');
Route::get('/login','LoginController@showLogin');
Route::get('/logout','LogoutController@doLogout');
Route::get('/home',array('before' => 'auth','as'=>'others_questions','uses'=>'QuestionsController@get_others_questions'));
Route::get('/edit', array('before' => 'auth', 'uses' =>'EditController@showEdit'));
Route::get('question/{num?}',array('as'=>'question','uses'=>'QuestionsController@get_view'));
Route::get('results/{all?}', array( 'as' => 'results' ,'uses'=>'QuestionsController@get_results'));
Route::get('your_questions',array('before' => 'auth','as'=>'your_questions','uses'=>'QuestionsController@show_my_questions'));
Route::get('answer/{num?}/edit',array('before' => 'auth','as'=>'edit_answer','uses'=>'AnswersController@get_edit'));


Route::post('/register','RegisterController@doRegister');
Route::post('/login','LoginController@doLogin');
Route::post('/home','QuestionsController@post_create');
Route::post('/edit',array('before'=>'csrf','uses'=>'EditController@doEdit'));
Route::post('search', array('before'=>'csrf', 'uses'=>'QuestionsController@post_search'));
Route::post('answer',array('before' => 'auth','before'=>'csrf','uses'=>'AnswersController@post_answer'));
Route::post('answer/update',array('before' => 'auth','before'=>'csrf','uses'=>'AnswersController@post_update'));
