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

    //room
    Route::group(['prefix' => 'room', 'as'=>'.room'], function() {
        Route::get('/', 'Hospital\RoomController@index')->name('.manage');
        Route::get('/create', 'Hospital\RoomController@create')->name('.create');
        Route::post('/create', 'Hospital\RoomController@store')->name('.store');
        Route::get('/update/{id}', 'Hospital\RoomController@edit')->name('.edit');
        Route::post('/update/{id}', 'Hospital\RoomController@update')->name('.update');
        Route::get('/detail/{id}', 'Hospital\RoomController@show')->name('.detail');
        Route::get('/delete/{id}', 'Hospital\RoomController@destroy')->name('.delete');
    });

    //reservation
    Route::group(['prefix' => 'reservation', 'as'=>'.reservation'], function() {
        Route::get('/', 'Hospital\ReservationController@index')->name('.manage');
        Route::get('/create', 'Hospital\ReservationController@create')->name('.create');
        Route::post('/create', 'Hospital\ReservationController@store')->name('.store');
        Route::get('/update/{id}', 'Hospital\ReservationController@edit')->name('.edit');
        Route::post('/update/{id}', 'Hospital\ReservationController@update')->name('.update');
        Route::get('/detail/{id}', 'Hospital\ReservationController@show')->name('.detail');
        Route::get('/delete/{id}', 'Hospital\ReservationController@destroy')->name('.delete');
    });

    //report
    Route::group(['prefix' => 'report', 'as'=>'.report'], function() {
        Route::get('/', 'Hospital\ReportController@index')->name('.manage');
        Route::get('/create', 'Hospital\ReportController@create')->name('.create');
        Route::post('/create', 'Hospital\ReportController@store')->name('.store');
        Route::get('/update/{id}', 'Hospital\ReportController@edit')->name('.edit');
        Route::post('/update/{id}', 'Hospital\ReportController@update')->name('.update');
        Route::get('/detail/{id}', 'Hospital\ReportController@show')->name('.detail');
        Route::get('/delete/{id}', 'Hospital\ReportController@destroy')->name('.delete');
    });

    //profile
    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Hospital\ProfileController@index')->name('.index');
        Route::post('/profile', 'Hospital\ProfileController@profile')->name('.profile');
        Route::post('/user', 'Hospital\ProfileController@user')->name('.user');
    });

});