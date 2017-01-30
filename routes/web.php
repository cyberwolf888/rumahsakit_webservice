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


Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});


//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin'], 'as'=>'admin'], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('.dashboard');

    //hospital
    Route::group(['prefix' => 'hospital', 'as'=>'.hospital'], function() {
        Route::get('/', 'Admin\HospitalController@index')->name('.manage');
        Route::get('/create', 'Admin\HospitalController@create')->name('.create');
        Route::post('/create', 'Admin\HospitalController@store')->name('.store');
        Route::get('/update/{id}', 'Admin\HospitalController@edit')->name('.edit');
        Route::post('/update/{id}', 'Admin\HospitalController@update')->name('.update');
        Route::get('/detail/{id}', 'Admin\HospitalController@show')->name('.detail');
        Route::get('/delete/{id}', 'Admin\HospitalController@destroy')->name('.delete');
    });

    //member
    Route::group(['prefix' => 'member', 'as'=>'.member'], function() {
        Route::get('/', 'Master\PaketController@index')->name('.manage');
        Route::get('/create', 'Master\PaketController@create')->name('.create');
        Route::post('/create', 'Master\PaketController@store')->name('.store');
        Route::get('/update/{id}', 'Master\PaketController@edit')->name('.edit');
        Route::post('/update/{id}', 'Master\PaketController@update')->name('.update');
        Route::get('/detail/{id}', 'Master\PaketController@show')->name('.detail');
        Route::get('/delete/{id}', 'Master\PaketController@destroy')->name('.delete');
    });

    //admin
    Route::group(['prefix' => 'user', 'as'=>'.u_admin'], function() {
        Route::get('/', 'Master\PaketController@index')->name('.manage');
        Route::get('/create', 'Master\PaketController@create')->name('.create');
        Route::post('/create', 'Master\PaketController@store')->name('.store');
        Route::get('/update/{id}', 'Master\PaketController@edit')->name('.edit');
        Route::post('/update/{id}', 'Master\PaketController@update')->name('.update');
        Route::get('/detail/{id}', 'Master\PaketController@show')->name('.detail');
        Route::get('/delete/{id}', 'Master\PaketController@destroy')->name('.delete');
    });
});

//Rumah Sakit
Route::group(['prefix' => 'hospital', 'middleware' => ['role:hospital'], 'as'=>'hospital'], function() {
    Route::get('/', 'Master\DashboardController@index')->name('.dashboard');
});