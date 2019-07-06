<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

// User

Route::prefix('users')->group(function (){
    Route::get('/', 'User\UserController@index')->name('user.index')
        ->middleware('permission:user.index');
    Route::get('create', 'User\UserController@create')->name('user.create')
        ->middleware('permission:user.create');
    Route::get('{id}', 'User\UserController@show')->name('user.show')
        ->middleware('permission:user.show');
    Route::post('store', 'User\UserController@store')->name('user.store')
        ->middleware('permission:user.create');
    Route::get('edit/{id}', 'User\UserController@edit')->name('user.edit')
        ->middleware('permission:user.edit');

    Route::put('update/{id}', 'User\UserController@update')->name('user.update')
        ->middleware('permission:user.edit');
    Route::post('delete/{id}', 'User\UserController@destroy')->name('user.delete')
        ->middleware('permission:user.delete');

    Route::post('user/password/set/request/{token}', 'User\UserController@passwordSetRequest')->name('user.password');
    Route::get('user/password/set/request/{token}', 'User\UserController@passwordSetRequest')->name('user.password');
    Route::put('user/password/set', 'User\UserController@setPassword')->name('user.password.set');

});


// House

Route::prefix('houses')->group(function (){
    Route::get('/', 'House\HouseController@index')->name('house.index')
        ->middleware('permission:house.index');
    Route::get('create', 'House\HouseController@create')->name('house.create')
        ->middleware('permission:house.create');
    Route::get('{id}', 'House\HouseController@show')->name('house.show')
        ->middleware('permission:house.show');
    Route::post('store', 'House\HouseController@store')->name('house.store')
        ->middleware('permission:house.create');
    Route::get('edit/{id}', 'House\HouseController@edit')->name('house.edit')
        ->middleware('permission:house.edit');
    Route::put('update/{id}', 'House\HouseController@update')->name('house.update')
        ->middleware('permission:house.edit');
    Route::post('delete/{id}', 'House\HouseController@destroy')->name('house.delete')
        ->middleware('permission:house.delete');
});


// Room

Route::prefix('rooms')->group(function (){
    Route::get('/', 'Room\RoomController@index')->name('room.index')
        ->middleware('permission:room.index');
    Route::get('create', 'Room\RoomController@create')->name('room.create')
        ->middleware('permission:room.create');
    Route::get('{id}', 'Room\RoomController@show')->name('room.show')
        ->middleware('permission:room.show');
    Route::post('store', 'Room\RoomController@store')->name('room.store')
        ->middleware('permission:room.create');
    Route::get('edit/{id}', 'Room\RoomController@edit')->name('room.edit')
        ->middleware('permission:room.edit');
    Route::put('update/{id}', 'Room\RoomController@update')->name('room.update')
        ->middleware('permission:room.edit');
    Route::post('delete/{id}', 'Room\RoomController@destroy')->name('room.delete')
        ->middleware('permission:room.delete');
});

// Renter

Route::prefix('renters')->group(function (){
    Route::get('/', 'Renter\RenterController@index')->name('renter.index')
        ->middleware('permission:renter.index');
    Route::get('create', 'Renter\RenterController@create')->name('renter.create')
        ->middleware('permission:renter.create');
    Route::get('{id}', 'Renter\RenterController@show')->name('renter.show')
        ->middleware('permission:renter.show');
    Route::post('store', 'Renter\RenterController@store')->name('renter.store')
        ->middleware('permission:renter.create');
    Route::get('edit/{id}', 'Renter\RenterController@edit')->name('renter.edit')
        ->middleware('permission:renter.edit');
    Route::put('update/{id}', 'Renter\RenterController@update')->name('renter.update')
        ->middleware('permission:renter.edit');
    Route::post('delete/{id}', 'Renter\RenterController@destroy')->name('renter.delete')
        ->middleware('permission:renter.delete');
});


// Transaction

Route::prefix('transactions')->group(function (){
    Route::get('/', 'Transaction\TransactionController@index')->name('transaction.index')
        ->middleware('permission:transaction.index');
    Route::get('create', 'Transaction\TransactionController@create')->name('transaction.create')
        ->middleware('permission:transaction.create');
    Route::get('{id}', 'Transaction\TransactionController@show')->name('transaction.show')
        ->middleware('permission:transaction.show');
    Route::post('store', 'Transaction\TransactionController@store')->name('transaction.store')
        ->middleware('permission:transaction.store');
    Route::get('edit/{id}', 'Transaction\TransactionController@edit')->name('transaction.edit')
        ->middleware('permission:transaction.edit');
    Route::put('update/{id}', 'Transaction\TransactionController@update')->name('transaction.update')
    ->middleware('permission:transaction.update');
    Route::post('delete/{id}', 'Transaction\TransactionController@destroy')->name('transaction.delete')
        ->middleware('permission:transaction.delete');

});


// Setting

Route::prefix('settings')->group(function (){
    Route::get('/', 'Setting\SettingController@index')->name('setting.index')
    ->middleware('permission:setting.index');

    Route::post('/default_roles', 'Setting\SettingController@defaultRoles')->name('setting.roles')
        ->middleware('permission:setting.index');

});

