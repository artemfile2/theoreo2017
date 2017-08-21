<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Client'],function () {
    Route::get('/', 'PageController@index')->name('client.index');

    Route::get('/action/{action}', 'PageController@action')->name('showAction');

    Route::get('/category/{id}', 'PageController@showCategory')->name('showCategory');

    Route::get('/archives', 'PageController@showArchives')->name('client.showArchives');

    Route::get('/same/{action}', 'PageController@showSameActions')->name('client.showSameActions');

    Route::get('/brand/{id}', 'PageController@filterByBrand')->name('client.filterByBrand');

    Route::get('/tag/', 'PageController@filterByTag')->name('client.filterByTag');


    /* Поиск */

    Route::post('/search', 'PageController@search')->name('client.actionSearch');
});

/**
 * Аутентификация
 */

/**
 * Логин
 */
Route::get('/login', 'AuthController@login')
    ->name('login');

Route::post('/login', 'AuthController@loginPost')
    ->name('loginPost');

/**
 * Логаут
 */
Route::get('/logout', 'AuthController@logout')
    ->name('logout');