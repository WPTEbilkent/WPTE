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


Route::get('/', 'HomeController@index');
Route::get('/tutorial', 'HomeController@tutorial');
Route::get('/tutorialPage', 'HomeController@tutorialPage');


Route::get('/ozan/oo', function(){
   return view('tutorial');
});
