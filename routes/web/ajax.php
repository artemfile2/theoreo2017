<?php

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'ajax'],function () {

    /* Ajax для Админки */
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin:admin_access'],function () {

        Route::post('/admin/category/add', 'AjaxController@categoryAddPost')
            ->name('ajax.admin.categoryAddPost');

        Route::post('/admin/tag/add', 'AjaxController@tagAddPost')
            ->name('ajax.admin.tagAddPost');

    });
});


