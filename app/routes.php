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

//Route::get('Request term', function(){});
//localhost:8000/Request term

/*Route::get('/', function()
{
	return View::make('hello');
<<<<<<< HEAD
});*/
// same function as: 
// Route::get('/', 'HomeController@showWelcome');
// Route::get('destination', 'controller name@fn name')


// any (wild-card verb): covers all the bases 
/*Route::any('ask-questions', array(
	//'before'=>'auth.basic',
	'as'=>'questions', function()
{
	return "Questions FORM" ;
	// nktb view 3ozeno yzhar 
	// return View::make('esm el view.php file');
	// mmkn n connect el file da, be css file n3mlo creation gwa public\css
}));*/


//el Home page bt3ty hya el Ask Question
 Route::any('/', array('before'=>'auth.basic',
 'uses'=>'QuestionsController@fn name',
 'as'=>'Home'));


// Redirect::to('about/...');
// Redirect::route('name of the route');


Route::get('/register','RegisterController@showRegister');
Route::post('/register','RegisterController@doRegister');

Route::get('/login','LoginController@showLogin');
Route::post('/login','LoginController@doLogin');
