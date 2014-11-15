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

//Home index route
Route::get('/', function()
{
	return View::make('index');
});


//Admin rotes
Route::get('admin', function()
{
    return View::make('admin');
})->before('auth');


Route::group(array('prefix' => 'admin', 'before' => array('auth|admin')), function()
{
    Route::resource('posts', 'Admin\\PostsController');
    Route::resource('photos', 'Admin\\PhotosController');
    Route::post('validate', 'Admin\\PhotosController@validateAttribute');
    Route::resource('categories', 'Admin\\CategoriesController',['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('collections', 'Admin\\CollectionsController',['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('tags', 'Admin\\TagsController',['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);

});


//Public routes
Route::resource('posts', 'PostsController', ['only' => ['index', 'show']]);
Route::resource('photos', 'PhotosController', ['only' => ['index', 'show']]);


//Log in and atuth routes
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController', ['only' => ['create', 'destroy', 'store']]);

