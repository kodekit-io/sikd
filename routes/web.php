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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('sikd.home');
});
Route::get('/login', function () {
    return view('sikd.login');
});
Route::get('/level-1', function () {
    return view('sikd.level-1');
});
Route::get('/level-2', function () {
    return view('sikd.level-2');
});
Route::get('/level-3', function () {
    return view('sikd.level-3');
});
