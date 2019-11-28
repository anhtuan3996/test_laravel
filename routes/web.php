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
        Route::get('{nation}', 'NationController@detail')->name('nations.detail');
    });
});
