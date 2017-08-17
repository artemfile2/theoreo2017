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

        /*
         * роуты в админке для пункта Пользователи*/
        Route::group(['prefix' => 'users'], function (){
            Route::get('/', 'UsersController@users')
                ->name('admin.user.get_all');

            Route::get('/create', 'UsersController@userCreate')
                ->name('admin.user.create');

            Route::post('/create', 'UsersController@userCreatePost')
                ->name('admin.user.createPost');

            Route::get('/edit/{id}', 'UsersController@userEdit')
                ->name('admin.user.edit');

            Route::post('/edit/{id}', 'UsersController@userEditPost')
                ->name('admin.user.editPost');

            Route::get('/restore/{id}', 'UsersController@userRestore')
                ->name('admin.user.restore');

            Route::get('/trash/{id}', 'UsersController@userTrash')
                ->name('admin.user.trash');

            Route::get('/delete/{id}', 'UsersController@userDelete')
                ->name('admin.user.delete');
        });

        /*
         * роуты в админке для пункта Компании/Бренды*/
        Route::group(['prefix' => 'brands'], function (){
            Route::get('/', 'BrandsController@brands')
                ->name('admin.brands.get_all');

            Route::get('/create', 'BrandsController@brandCreate')
                ->name('admin.brands.create');

            Route::post('/create', 'BrandsController@brandCreatePost')
                ->name('admin.brands.createPost');

            Route::get('/edit/{id}', 'BrandsController@brandEdit')
                ->name('admin.brands.edit');

            Route::post('/edit/{id}', 'BrandsController@brandEditPost')
                ->name('admin.brands.editPost');

            Route::get('/trash/{id}', 'BrandsController@brandTrash')
                ->name('admin.brands.trash');

            Route::get('/restore/{id}', 'BrandsController@brandRestore')
                ->name('admin.brands.restore');

            Route::get('/delete/{id}', 'BrandsController@brandDelete')
                ->name('admin.brands.delete');
        });

        /*
        * роуты в админке для пункта Акции*/
        Route::group(['prefix' => 'actions'], function (){
            Route::get('/', 'ActionsController@actions')
                ->name('admin.actions.get_all');

            Route::get('/create', 'ActionsController@actionCreate')
                ->name('admin.actions.create');

            Route::post('/create', 'ActionsController@actionCreatePost')
                ->name('admin.actions.createPost');

            Route::get('/edit/{id}', 'ActionsController@actionEdit')
                ->name('admin.actions.edit');

            Route::post('/edit/{id}', 'ActionsController@actionEditPost')
                ->name('admin.actions.editPost');

            Route::get('/trash/{id}', 'ActionsController@actionTrash')
                ->name('admin.actions.trash');

            Route::get('/restore/{id}', 'ActionsController@actionRestore')
                ->name('admin.actions.restore');

            Route::get('/delete/{id}', 'ActionsController@actionDelete')
                ->name('admin.actions.delete');
        });

        /*
        * роуты в админке для пункта Контент*/
        Route::group(['prefix' => 'content'], function (){

            Route::get('/', 'ContentController@content')
                ->name('admin.content.get_all');

            /*
             * Роут для извлечения данных из парсера во временную таблицу*/
            Route::post('/', 'ContentController@VKFeedDownload')
                ->name('admin.content.download');

            /*
             * роут для jquery - button.js,
             * Insert копирует запись из временной таблицы в таблицу Акции
             * и мягко удаляет данную запись*/
            Route::get('/insert/{id}', 'ContentController@insert')
                ->name('admin.content.insert');
            /*
             * Delete мягко удаляет запись из временной таблицы*/
            Route::get('/delete/{id}', 'ContentController@delete')
                ->name('admin.content.delete');
        });


    /* Route::get('/comments', 'AdminController@comments')
         ->name('admin.comments');*/

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