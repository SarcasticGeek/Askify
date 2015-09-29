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



 Route::get('/', array('before'=>'auth.basic',
 'uses'=>'QuestionsController@fn name',
 'as'=>'Home')); //fn d el mfrod index, msh 3rfa lsa hya bt3ml a :D 
 Route::post('/ask',array('before'=>'csrf',
 	'used'=>'QuestionsController@create'));


Route::get('/register','RegisterController@showRegister');
Route::post('/register','RegisterController@doRegister');

Route::get('/login','LoginController@showLogin');
Route::post('/login','LoginController@doLogin');
