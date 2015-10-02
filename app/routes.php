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
 	return View::make('hello');
 });
 Route::post('/',array('before'=>'csrf',
 	'uses'=>'QuestionsController@post_create'));


Route::get('/register','RegisterController@showRegister');
Route::post('/register','RegisterController@doRegister');

Route::get('/login','LoginController@showLogin');
Route::post('/login','LoginController@doLogin');

Route::get('/logout','LogoutController@doLogout');


Route::get('/home', function(){
	return View::make('home');
})->before('auth');

Route::post('/home','QuestionsController@post_create');
Route::get('/edit','EditController@showEdit')->before('auth');
Route::post('/edit',array('before'=>'csrf',
 	'uses'=>'EditController@doEdit'));


