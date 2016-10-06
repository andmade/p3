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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usergen', function () {
    return "<h1>Random userrrrrrrs</h1>";
});
Route::get('/gladosipsum', function () {
    return "<h1>Oh, it's you.</h1>";
});
