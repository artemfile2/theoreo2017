<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
/* Требуется авторизация */

/*'middleware' => 'auth',*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'],function () {

    Route::get('/', 'AdminController@index')
        ->name('admin');

    Route::get('/users', 'AdminController@users')
        ->name('admin.users');

    Route::get('/brands', 'AdminController@brands')
        ->name('admin.brands');

    Route::get('/actions', 'AdminController@actions')
        ->name('admin.actions');

   /* Route::get('/comments', 'AdminController@comments')
        ->name('admin.comments');*/

    Route::get('/content', 'AdminController@content')
        ->name('admin.content');

    Route::get('/logs', 'AdminController@logs')
        ->name('admin.logs');

    Route::get('/queries', 'AdminController@queries')
        ->name('admin.queries');

});

Route::group(['namespace' => 'Admin', 'prefix' => 'user'],function () {

    Route::get('/', 'AuthController@auth')
        ->name('auth');

    Route::get('/login', 'AuthController@login')
        ->name('login');

    Route::get('/register', 'AuthController@register')
        ->name('register');

    Route::get('/request', 'AuthController@request')
        ->name('password.request');
});