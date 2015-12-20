<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/* Authentication route start */
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);
/* Authentication route end */

//HomePage Route..
Route::get('/', 'HomeController@index');

//TurorialPages routing
Route::resource('/tutorial','TutorialController');

//ProfilePage route..
Route::get('/profile/{id}', ['uses' => 'ProfileController@getUser']);

//Q&A routing..
//Route::get('/QA','QAController@index');
//Route::get('/QA/{page}','QAController@show');
//Route::post('/QA/AskQuestion');
Route::resource('/QA','QAController');




