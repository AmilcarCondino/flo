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

Route::group(array('prefix' => 'admin', 'before' => array('auth|admin')), function()
{
    Route::resource('posts', 'Admin\\PostsController');
    Route::resource('photos', 'Admin\\PhotosController');
    Route::resource('categories', 'Admin\\CategoriesController');
    Route::resource('collections', 'Admin\\CollectionsController');
    Route::resource('tags', 'Admin\\TagsController');
});

Route::resource('posts', 'PostsController');

Route::resource('photos', 'PhotosController');

Route::get('login', 'UsersController@create');
Route::get('logout', 'UsersController@destroy');

Route::resource('users', 'UsersController', ['only' => ['create', 'destroy', 'store']]);

//Routes for complete de photos crud
//Route::resource('categories', 'CategoriesController');
//Route::resource('collections', 'CollectionsController');
//Route::resource('tags', 'TagsController');