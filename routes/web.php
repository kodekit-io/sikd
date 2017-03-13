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

    Route::get('home/{year?}', 'HomeController@home');
    Route::get('get-infrastructure-data/{year}', 'HomeController@infrastructureData');
    Route::get('get-simpanan-pemda-data', 'HomeController@simpananPemdaData');
    Route::get('get-realisasi-tkdd-data/{year}', 'HomeController@realisasiTkdd');

    Route::get('get-dak-fisik-data/{year}', 'HomeController@dakFisik');
    Route::get('get-dana-desa-data/{year}', 'HomeController@danaDesa');
    Route::get('get-belanja-data/{year}', 'HomeController@belanja');
    Route::get('get-realisasi-pad-data/{year}', 'HomeController@realisasiPad');
    Route::get('get-lra-data/{year}', 'HomeController@lra');

    Route::get('/level-1/{type}/{postureId}/{year?}', 'MapController@map');
    Route::get('get-map-chart/{type}/{year}/{postureId?}', 'MapController@getMapChart');

    Route::get('/level-2/{type}/{postureId}/{year}/{provinceId}', 'ProvinceController@province');
    Route::get('get-province-chart/{type}/{postureId}/{year}/{provinceId}', 'ProvinceController@getProvinceChart');

    Route::get('/pemda/{satkerCode}/{year}', 'PemdaController@profile');
    Route::get('/get-pemda-chart/{year}/{satkerCode}', 'PemdaController@chart');
    Route::get('/get-pemda-apbd-table-data/{year}/{satkerCode}', 'PemdaController@apbdTableData');
    Route::get('/get-pemda-tkdd-table-data/{year}/{satkerCode}', 'PemdaController@tkddTableData');
    Route::get('/get-pemda-other-table-data/{satkerCode}', 'PemdaController@otherTableData');

    Route::get('get-provinces', 'ProvinceController@getProvince');

    Route::get('user', 'UserController@index');
    Route::get('get-user-list', 'UserController@getUsers');
    Route::get('user/add', 'UserController@add');
    Route::post('user/create', 'UserController@create');
    Route::get('user/{id}/edit', 'UserController@edit');
    Route::post('user/{id}/update', 'UserController@update');
    Route::get('user/{id}/delete', 'UserController@delete');

    Route::get('tkdd-posture', 'TkddController@index');
    Route::get('tkdd-posture/get-postures', 'TkddController@getPostures');
    Route::get('tkdd-posture/add', 'TkddController@add');
    Route::post('tkdd-posture/create', 'TkddController@create');
    Route::get('tkdd-posture/{id}/edit', 'TkddController@edit');
    Route::post('tkdd-posture/{id}/update', 'TkddController@update');
    Route::get('tkdd-posture/{id}/delete', 'TkddController@delete');

    Route::get('apbd-posture', 'ApbdController@index');
    Route::get('apbd-posture/get-postures', 'ApbdController@getPostures');
    Route::get('apbd-posture/add', 'ApbdController@add');
    Route::post('apbd-posture/create', 'ApbdController@create');
    Route::get('apbd-posture/{id}/edit', 'ApbdController@edit');
    Route::post('apbd-posture/{id}/update', 'ApbdController@update');
    Route::get('apbd-posture/{id}/delete', 'ApbdController@delete');

    Route::get('account-mapping', 'AccountMappingController@index');
    Route::get('account-mapping/get-accounts', 'AccountMappingController@getAccounts');
    Route::get('account-mapping/add', 'AccountMappingController@add');
    Route::post('account-mapping/create', 'AccountMappingController@create');
    Route::get('account-mapping/{id}/edit', 'AccountMappingController@edit');
    Route::post('account-mapping/{id}/update', 'AccountMappingController@update');
    Route::get('account-mapping/{id}/delete', 'AccountMappingController@delete');
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
// Route::get('test/cache_infra', function () {
//     $cache = Cache::get('infrastruktur_2016');
//     var_dump($cache);
// });
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/account-profile', function () {
//         return view('sikd.account-profile');
//     });
//
//     Route::get('/account-edit', function () {
//         return view('sikd.account-edit');
//     });
//
//     Route::get('/account-manage', function () {
//         return view('sikd.account-manage');
//     });
//
//     Route::get('/account-add', function () {
//         return view('sikd.account-add');
//     });
//
//     Route::get('/content-management', function () {
//         return view('sikd.content-management');
//     });
//
//     Route::get('/content-edit', function () {
//         return view('sikd.content-edit');
//     });
// });

