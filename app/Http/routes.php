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

Route::auth();

Route::get('/home', 'HomeController@index');


$router->group(['prefix' => 'admin', 'middleware' => 'admin'], function () use ($router) {
	 Route::get('/', 'AdminController@index');
	 Route::get('create', 'AdminController@create');
	 Route::post('store', 'AdminController@store');
	 Route::get('update/{id}', 'AdminController@update');
	 Route::post('edit', 'AdminController@edit');
	 Route::get('delete/{id}', 'AdminController@delete');
});
