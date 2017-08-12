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

        Route::group(['prefix' => 'users'], function (){
            Route::get('/', 'AdminController@users')
                ->name('admin.user.get_all');

            Route::get('/create', 'AdminController@userCreate')
                ->name('admin.user.create');

            Route::post('/create', 'AdminController@userCreatePost')
                ->name('admin.user.createPost');

            Route::get('/edit/{id}', 'AdminController@userEdit')
                ->name('admin.user.edit');

            Route::post('/edit', 'AdminController@userEditPost')
                ->name('admin.user.editPost');

            Route::get('/restore/{id}', 'AdminController@userRestore')
                ->name('admin.user.restore');

            Route::get('/trash/{id}', 'AdminController@userTrash')
                ->name('admin.user.trash');

            Route::get('/delete/{id}', 'AdminController@userDelete')
                ->name('admin.user.delete');
        });


        Route::group(['prefix' => 'brands'], function (){
            Route::get('/', 'BrandsController@brands')
                ->name('admin.brands.get_all');


        });



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