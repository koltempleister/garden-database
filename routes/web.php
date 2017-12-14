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


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@singlePage');

Route::get('calendar/{month}', 'CalendarController@index');
Route::get('migrate_tree', 'SeedsController@migrate_tree');


Route::get('stock/create/{seed_id}', 'StockItemsController@create');

Route::group(['middleware'=>'bindings'], function(){
    Route::get('seed','SeedsController@index');
    Route::get('seed/{seed}','SeedsController@show')->name('seed.show');
    Route::get('seed/{seed}/edit','SeedsController@edit')->name('seed.edit');
    Route::put('seed/{seed}','SeedsController@update');
    Route::put('seed/create','SeedsController@create');
    Route::post('seed','SeedsController@store');
});



Route::resource('species', 'SpeciesController');

Route::resource('stock', 'StockItemsController');

Route::get('sowings/{year}', 'SowingsController@index')->where('year', '[0-9]+');
Route::resource('sowings', 'SowingsController');


