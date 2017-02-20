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
    Route::get('get-infrastructure-data/{year}', 'HomeController@infrastructureData');
    Route::get('get-simpanan-pemda-data', 'HomeController@simpananPemdaData');
    Route::get('get-realisasi-tkdd-data/{year}', 'HomeController@realisasiTkdd');

    Route::get('get-dak-fisik-data/{year}', 'HomeController@dakFisik');
    Route::get('get-dana-desa-data/{year}', 'HomeController@danaDesa');
    Route::get('get-belanja-data/{year}', 'HomeController@belanja');
    Route::get('get-realisasi-pad-data/{year}', 'HomeController@realisasiPad');

    Route::get('/level-1/{type}/{postureId}/{year?}', 'MapController@map');
    Route::get('get-map-chart/{type}/{year}/{postureId?}', 'MapController@getMapChart');

    Route::get('/level-2/{type}/{postureId}/{year}/{provinceId}', 'ProvinceController@province');
    Route::get('get-province-chart/{type}/{postureId}/{year}/{provinceId}', 'ProvinceController@getProvinceChart');

    Route::get('/pemda/{satkerCode}/{year}', 'PemdaController@profile');
    Route::get('/get-pemda-chart/{year}/{satkerCode}', 'PemdaController@chart');
    Route::get('/get-pemda-apbd-table-data/{year}/{satkerCode}', 'PemdaController@apbdTableData');
    Route::get('/get-pemda-tkdd-table-data/{year}/{satkerCode}', 'PemdaController@tkddTableData');
    Route::get('/get-pemda-other-table-data/{satkerCode}', 'PemdaController@otherTableData');

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

use App\Service\Sikd;
use Illuminate\Support\Facades\Cache;

Route::get('test/apbd', 'TestController@apbd');
Route::get('test/api', 'TestController@api');

Route::get('test/cache_infra', function () {
    $cache = Cache::get('infrastruktur_2016');
    var_dump($cache);
});