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

Route::group(['middleware' => ['auth', 'province', 'role']], function () {

    Route::get('home/{year?}', 'HomeController@home')->name('home');
    Route::get('get-infrastructure-data/{year}', 'HomeController@infrastructureData')->name('home');
    Route::get('get-simpanan-pemda-data', 'HomeController@simpananPemdaData')->name('home');
	Route::get('get-ipm', 'HomeController@dataIpm')->name('home');
	Route::get('get-ppm', 'HomeController@dataPpm')->name('home');
	Route::get('get-tpt', 'HomeController@dataTpt')->name('home');
    Route::get('get-realisasi-tkdd-data/{year}', 'HomeController@realisasiTkdd')->name('home');
    Route::get('get-dak-fisik-data/{year}', 'HomeController@dakFisik')->name('home');
    Route::get('get-dana-desa-data/{year}', 'HomeController@danaDesa')->name('home');
    Route::get('get-belanja-data/{year}', 'HomeController@belanja')->name('home');
    Route::get('get-realisasi-pad-data/{year}', 'HomeController@realisasiPad')->name('home');
    Route::get('get-lra-data/{year}', 'HomeController@lra')->name('home');

    Route::get('/level-1/{type}/{postureId}/{year?}/{month?}', 'MapController@map')->name('level-1');
    Route::get('get-map-chart/{type}/{year}/{postureId?}/{month?}', 'MapController@getMapChart')->name('level-1');

    Route::get('/level-2/{type}/{postureId}/{year}/{provinceId}/{month?}', 'ProvinceController@province')->name('level-2');
    Route::get('get-province-chart/{type}/{postureId}/{year}/{provinceId}/{month?}', 'ProvinceController@getProvinceChart')->name('level-2');

    Route::get('/pemda/{satkerCode}/{year}', 'PemdaController@profile')->name('level-3');
    Route::get('/get-pemda-chart/{year}/{satkerCode}', 'PemdaController@chart')->name('level-3');
    Route::get('/get-pemda-apbd-table-data/{year}/{satkerCode}', 'PemdaController@apbdTableData')->name('level-3');
    Route::get('/get-pemda-tkdd-table-data/{year}/{satkerCode}', 'PemdaController@tkddTableData')->name('level-3');
    Route::get('/get-pemda-other-table-data/{satkerCode}', 'PemdaController@otherTableData')->name('level-3');

    Route::get('get-provinces', 'ProvinceController@getProvince');

    Route::get('user', 'UserController@index')->name('admin');
    Route::get('get-user-list', 'UserController@getUsers')->name('admin');
    Route::get('user/add', 'UserController@add')->name('admin');
    Route::post('user/create', 'UserController@create')->name('admin');
    Route::get('user/{id}/edit', 'UserController@edit')->name('admin');
    Route::post('user/{id}/update', 'UserController@update')->name('admin');
    Route::get('user/{id}/delete', 'UserController@delete')->name('admin');

    Route::get('tkdd-posture', 'TkddController@index')->name('admin');
    Route::get('tkdd-posture/get-postures', 'TkddController@getPostures')->name('admin');
    Route::get('tkdd-posture/add', 'TkddController@add')->name('admin');
    Route::post('tkdd-posture/create', 'TkddController@create')->name('admin');
    Route::get('tkdd-posture/{id}/edit', 'TkddController@edit')->name('admin');
    Route::post('tkdd-posture/{id}/update', 'TkddController@update')->name('admin');
    Route::get('tkdd-posture/{id}/delete', 'TkddController@delete')->name('admin');

    Route::get('apbd-posture', 'ApbdController@index')->name('admin');
    Route::get('apbd-posture/get-postures', 'ApbdController@getPostures')->name('admin');
    Route::get('apbd-posture/add', 'ApbdController@add')->name('admin');
    Route::post('apbd-posture/create', 'ApbdController@create')->name('admin');
    Route::get('apbd-posture/{id}/edit', 'ApbdController@edit')->name('admin');
    Route::post('apbd-posture/{id}/update', 'ApbdController@update')->name('admin');
    Route::get('apbd-posture/{id}/delete', 'ApbdController@delete')->name('admin');

    Route::get('account-mapping', 'AccountMappingController@index')->name('admin');
    Route::get('account-mapping/get-accounts', 'AccountMappingController@getAccounts')->name('admin');
    Route::get('account-mapping/add', 'AccountMappingController@add')->name('admin');
    Route::post('account-mapping/create', 'AccountMappingController@create')->name('admin');
    Route::get('account-mapping/{id}/edit', 'AccountMappingController@edit')->name('admin');
    Route::post('account-mapping/{id}/update', 'AccountMappingController@update')->name('admin');
    Route::get('account-mapping/{id}/delete', 'AccountMappingController@delete')->name('admin');
});

Route::get('test/api-exception', 'MiscController@apiException');

use App\Service\Sikd;
// use Illuminate\Support\Facades\Cache;

Route::get('test/apbd', 'TestController@apbd');
Route::get('test/map/{a}/{b}/{c}', 'TestController@map');
Route::get('test/api-5/{a}/{b}/{c}/{d}/{e}', 'TestController@api5');
Route::get('test/api-4/{a}/{b}/{c}/{d}', 'TestController@api4');
Route::get('test/api-3/{a}/{b}/{c}', 'TestController@api3');
Route::get('test/api-2/{a}/{b}', 'TestController@api2');
Route::get('test/api-1/{a}', 'TestController@api1');

Route::get('static', 'MiscController@static');
