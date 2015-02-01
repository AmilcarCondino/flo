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
    $sliders = DB::table('sliders')->orderBy('order')->get();
    $captions = DB::table('captions')->get();
	return View::make('index')
        ->with('sliders', $sliders)
        ->with('captions', $captions);
});


//Admin rotes
Route::get('admin', function()
{
    $categories = DB::table('categories')->get();
    $collections = DB::table('collections')->get();
    $tags = DB::table('tags')->get();

    return View::make('admin')
        ->with('categories', $categories)
        ->with('collections', $collections)
        ->with('tags', $tags);
})->before('auth');


Route::group(array('prefix' => 'admin', 'before' => array('auth|admin')), function()
{
    Route::resource('posts', 'Admin\\PostsController');
    Route::resource('photos', 'Admin\\PhotosController');
    Route::post('validate', 'Admin\\PhotosController@validateAttribute');
    Route::resource('categories', 'Admin\\CategoriesController',['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('collections', 'Admin\\CollectionsController',['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('tags', 'Admin\\TagsController',['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('sliders', 'Admin\\SlidersController');
    Route::resource('captions', 'Admin\\CaptionsController');

});


//Public routes
Route::resource('posts', 'PostsController', ['only' => ['index', 'show']]);
Route::resource('photos', 'PhotosController', ['only' => ['index', 'show', 'filter']]);



//Log in and atuth routes
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController', ['only' => ['create', 'destroy', 'store']]);

