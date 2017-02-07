<?php

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/tentang', function () {
    return view('sikd.page-tentang');
});
Route::get('/disclaimer', function () {
    return view('sikd.page-disclaimer');
});
Route::get('/panduan', function () {
    return view('sikd.page-panduan');
});

Route::get('/login', 'ApiAuthController@getLogin');
Route::post('/login', 'ApiAuthController@postLogin');
Route::post('/logout', 'ApiAuthController@logout');
Route::get('/logout', 'ApiAuthController@logout');

Route::group(['middleware' => ['auth', 'province']], function () {

    Route::get('home', 'HomeController@home');

    Route::get('/level-1/{reportType?}', 'MapController@map');
    Route::get('get-map-chart/{reportType}', 'MapController@getMapChart');

    Route::get('/level-2/{provinceId}/{reportType?}', 'ProvinceController@province');
    Route::get('get-province-chart/{provinceId}/{reportType?}', 'ProvinceController@getProvinceChart');

    Route::get('/pemda/{satkerCode}', 'PemdaController@profile');
    Route::get('/get-pemda-chart/{year}/{satkerCode}', 'PemdaController@chart');

    Route::get('/account-profile', function () {
        return view('sikd.account-profile');
    });

    Route::get('/account-edit', function () {
        return view('sikd.account-edit');
    });

    Route::get('/account-manage', function () {
        return view('sikd.account-manage');
    });

    Route::get('/account-add', function () {
        return view('sikd.account-add');
    });

    Route::get('/content-management', function () {
        return view('sikd.content-management');
    });

    Route::get('/content-edit', function () {
        return view('sikd.content-edit');
    });

    Route::get('get-provinces', 'ProvinceController@getProvince');
});

Route::get('test/api-exception', 'MiscController@apiException');

use App\Service\Mediawave;

Route::get('test/apbd', 'TestController@apbd');