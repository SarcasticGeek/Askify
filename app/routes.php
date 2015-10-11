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


Route::get('/home',array('before' => 'auth','as'=>'others_questions','uses'=>'QuestionsController@get_others_questions'));


Route::get('/logout',array('as'=>'logout','uses'=>'LogoutController@doLogout'));


Route::post('/home','QuestionsController@post_create');
Route::get('/edit',array('as'=>'edit','uses'=>'EditController@showEdit'))->before('auth');


Route::post('/edit',array('before'=>'csrf',
 	'uses'=>'EditController@doEdit'));


Route::get('question/{num?}',array('as'=>'question','uses'=>'QuestionsController@get_view'));


Route::get('results/{all?}', array( 'as' => 'results' ,'uses'=>'QuestionsController@get_results'));
Route::post('search', array('before'=>'csrf', 'uses'=>'QuestionsController@post_search'));



Route::get('your_questions',array('before' => 'auth|banned','as'=>'your_questions','uses'=>'QuestionsController@show_my_questions'));
//Routs of ziad
Route::get('question/{num?}/edit',array('as'=>'edit_question','uses'=>'QuestionsController@get_edit'));
Route::post('question/update',array('before' => 'auth','before'=>'csrf','uses'=>'QuestionsController@post_update'));

//Routes of answering
Route::post('answer',array('before' => 'auth','before'=>'ifAdmin','before'=>'csrf','uses'=>'AnswersController@post_answer'));
Route::get('answer/{num?}/edit',array('before' => 'auth','before'=>'ifAdmin','as'=>'edit_answer','uses'=>'AnswersController@get_edit'));
Route::post('answer/update',array('before' => 'auth','before'=>'ifAdmin','before'=>'csrf','uses'=>'AnswersController@post_update'));


//Routs of Owner
Route::get('tags',array('as'=>'tags','before' => 'auth','before'=>'ifAdmin','uses'=>'OwnersController@show_my_tags'));
Route::get('tag/{num?}',array('as'=>'tag','before' => 'auth','before'=>'ifAdmin','uses'=>'OwnersController@get_view_tag'));
Route::post('tag/new',array('before' => 'auth','before'=>'csrf','before'=>'ifAdmin','uses'=>'OwnersController@post_new_tag'));
