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
 	return View::make('hello');});

Route::get('/register','RegisterController@showRegister');
Route::post('/register','RegisterController@doRegister');

Route::get('/login','LoginController@showLogin');
Route::post('/login','LoginController@doLogin');

<<<<<<< HEAD
Route::get('/home', function(){
	return View::make('home'); });
//Route::get('/home', array('as'=>'Home', 'uses'=>'QuestionsController@get_index')); 
Route::post('/home',array('before'=>'csrf',
 	'uses'=>'QuestionsController@post_create'));


 



=======

/*Route::get('/home', function(){
	return View::make('home');
});*/
Route::get('/home',array('before' => 'auth','as'=>'your_questions','uses'=>'QuestionsController@get_your_questions'));


Route::get('/logout','LogoutController@doLogout');


Route::post('/home','QuestionsController@post_create');
Route::get('/edit','EditController@showEdit')->before('auth');
Route::post('/edit',array('before'=>'csrf',
 	'uses'=>'EditController@doEdit'));


Route::get('question/{num?}',array('as'=>'question','uses'=>'QuestionsController@get_view'));


Route::get('results/{all?}', array( 'as' => 'results' ,'uses'=>'QuestionsController@get_results'));
Route::post('search', array('before'=>'csrf', 'uses'=>'QuestionsController@post_search'));


>>>>>>> bbb34733f61ab821c81b4aef51847c881840acc0

