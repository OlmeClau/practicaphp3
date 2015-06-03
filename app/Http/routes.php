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

Route::get('/', 'MovieController@index');
Route::resource('movies','MovieController');
Route::resource('reviews','ReviewController');
Route::resource('ratings','RatingController');
Route::resource('likes','LikeController');



Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/////////////////////////////////////////////////////////////////////////////////////////////


?>