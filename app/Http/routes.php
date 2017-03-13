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


Route::controllers([
	'auth' => 'Auth\AuthController',
]);

Route::get('/register', function () {
    return view('register');
});




Route::get('/profile', function () {
    return view('profile');
});

Route::auth();

Route::get('/', 'postController@index');

Route::resource('/post', 'postController');
Route::resource('/profile', 'profileController');
Route::post('/profile/changepassword', 'profileController@changepassword');