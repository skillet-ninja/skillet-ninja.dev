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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/auth/users/about', function () {
    return view('users.about');
});

Route::get('/users/about', function () {
    return view('users.about');
});

Route::get('/justin', function () {
    return view('recipes.create');
});

Route::get('/dross', function () {
    return view('auth.login');
});


Route::get('auth/logoutView', function () {
    return view('auth.logout');
});

Route::get('users/profile', function () {
    return action('UsersController@show' , Auth::id());
});


Route::resource('recipes','RecipesController');

Route::resource('users', 'UsersController', ['except' => ['create','store']]);

get('/profile', function(){
	return redirect()->action('UsersController@show', Auth::id());
});


// Authentication routes...
Route::get('auth/check', 'Auth\AuthController@authCheck');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('users/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


