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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('users');
    });
    Route::prefix('nations')->group(function () {
        Route::get('', 'NationController@index')->name('nations');
        Route::get('create', 'NationController@create')->name('nations.create');
        Route::post('create', 'NationController@store')->name('nations.store');
        Route::prefix('{nation}/cities')->group(function () {
            Route::get('', 'NationController@city')->name('nations.detail');
            Route::get('create', 'CityController@create')->name('city.create');
            Route::post('create', 'CityController@store')->name('city.store');
            Route::get('/{city}/districts', 'CityController@districts')->name('city.districts');
        });
    });

    Route::prefix('{city}')->group(function () {
        Route::prefix('districts')->group(function () {
            Route::get('', 'CityController@districts')->name('city.districts');
            Route::get('create', 'DistrictController@create')->name('district.create');
            Route::post('create', 'DistrictController@store')->name('district.store');
        });
    });

    Route::get('{district}/communes', 'DistrictController@communes')->name('district.communes');

    Route::prefix('{district}')->group(function () {
        Route::get('create', 'CommuneController@create')->name('commune.create');
        Route::post('create', 'CommuneController@store')->name('commune.store');
    });

});
