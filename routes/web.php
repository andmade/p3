<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {return view('landing');});
Route::get('usergen', 'UserController@index');
Route::post('usergen', 'UserController@generate');
Route::get('gladosipsum', 'IpsumController@index')->name('ipsum.index');
