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

Route::get('/', function()
{
	return View::make('index');
});

Route::resource('posts', 'PostsController');

Route::resource('photos', 'PhotosController');

Route::get('login', 'UsersController@create');
Route::get('logout', 'UsersController@destroy');

Route::resource('users', 'UsersController', ['only' => ['index', 'create', 'destroy', 'store']]);
