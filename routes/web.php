<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->middleware('guest');

Auth::routes();

Route::group(['prefix' => 'home'], function () {
	Route::get('/', 'HomeController@index');

    Route::post('/add', 'HomeController@store');

    Route::get('/fetch_data', 'HomeController@fetch_data');

    Route::get('/{id}', 'HomeController@show');

    Route::put('/{id}', 'HomeController@update');

    Route::delete('/{id}', 'HomeController@destroy');
});