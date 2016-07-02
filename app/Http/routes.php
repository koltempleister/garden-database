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

//Route::get('/', 'WelcomeController@index');



Route::get('/', 'SeedsController@index');

Route::get('calendar/{month}', 'CalendarController@index');
Route::get('migrate_tree', 'SeedsController@migrate_tree');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	
]);
Route::get('stock/create/{seed_id}', 'StockItemsController@create');
//Route::get('stock/{status?}', 'StockItemsController@index'); //deze confilicteer momenteel met controller.show, bedoeling om te filteren in create
Route::resource('seeds', 'SeedsController');
Route::resource('species', 'SpeciesController');


Route::resource('stock', 'StockItemsController');

Route::get('sowings/{year}', 'SowingsController@index')->where('year', '[0-9]+');
Route::resource('sowings', 'SowingsController');