<?php

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/login', 'ApiAuthController@getLogin');
Route::post('/login', 'ApiAuthController@postLogin');
Route::post('/logout', 'ApiAuthController@logout');
Route::get('/logout', 'ApiAuthController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/level-1', function () {
        return view('sikd.level-1');
    });

    Route::get('/level-2', function () {
        return view('sikd.level-2');
    });

    Route::get('/level-3', function () {
        return view('sikd.level-3');
    });

    Route::get('/home', function() {
        return view('sikd.home');
    });

});