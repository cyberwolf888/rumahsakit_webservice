<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    $user = Auth::user();
    if($user->hasRole('admin')) {
        return redirect()->intended('/admin');
    }elseif ($user->hasRole('hospital')){

        $hospital = $user->hospital;
        if($hospital->status == \App\Models\Hospital::STATUS_NOT_COMPLETE){
            return redirect()->route('hospital.finish.index');
        }

        return redirect()->intended('/hospital');
    }
});


/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/
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
        Route::get('/', 'Admin\MemberController@index')->name('.manage');
        Route::get('/create', 'Admin\MemberController@create')->name('.create');
        Route::post('/create', 'Admin\MemberController@store')->name('.store');
        Route::get('/update/{id}', 'Admin\MemberController@edit')->name('.edit');
        Route::post('/update/{id}', 'Admin\MemberController@update')->name('.update');
        //Route::get('/detail/{id}', 'Admin\MemberController@show')->name('.detail');
        //Route::get('/delete/{id}', 'Admin\MemberController@destroy')->name('.delete');
    });

    //admin
    Route::group(['prefix' => 'user', 'as'=>'.u_admin'], function() {
        Route::get('/admin', 'Admin\AdminController@index')->name('.manage');
        Route::get('/admin/create', 'Admin\AdminController@create')->name('.create');
        Route::post('/admin/create', 'Admin\AdminController@store')->name('.store');
        Route::get('/admin/update/{id}', 'Admin\AdminController@edit')->name('.edit');
        Route::post('/admin/update/{id}', 'Admin\AdminController@update')->name('.update');
        //Route::get('/detail/{id}', 'Admin\AdminController@show')->name('.detail');
        Route::get('/admin/delete/{id}', 'Admin\AdminController@destroy')->name('.delete');
    });
});


/*
|--------------------------------------------------------------------------
| Hospital Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'hospital', 'middleware' => ['role:hospital'], 'as'=>'hospital'], function() {
    Route::get('/', 'Hospital\DashboardController@index')->name('.dashboard');

    //complte account
    Route::group(['prefix' => 'finish', 'as'=>'.finish'], function() {
        Route::get('/', 'Hospital\DashboardController@finish')->name('.index');
        Route::post('/store', 'Hospital\DashboardController@store')->name('.store');
    });

});