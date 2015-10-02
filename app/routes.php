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

<<<<<<< HEAD
Route::get('/Questions', 'QuestionController@Ask');
Route::post('/Questions', 'QuestionController@Take');
=======


 Route::get('/',function(){
 	return View::make('hello');
 });
 Route::post('/',array('before'=>'csrf',
 	'uses'=>'QuestionsController@post_create'));


Route::get('/register','RegisterController@showRegister');
Route::post('/register','RegisterController@doRegister');

Route::get('/login','LoginController@showLogin');
Route::post('/login','LoginController@doLogin');

Route::get('/home', function(){
	return View::make('home');
});

Route::post('/home','QuestionsController@post_create');

>>>>>>> 7c4a84d565ab9940e9890f1235bff47a4a5a8ad0
