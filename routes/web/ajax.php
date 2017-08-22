<?php

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/

/* Ajax для Админки */

Route::group(['namespace' => 'Admin', 'prefix' => 'ajax', 'middleware' => 'admin:admin_access'],function () {

    Route::get('/admin/brand/add', 'AjaxController@brandAddForm')
        ->name('ajax.admin.brandAddForm');
    Route::post('/admin/brand/add', 'AjaxController@brandAddPost')
        ->name('ajax.admin.brandAddPost');
    Route::post('/admin/category/add', 'AjaxController@categoryAddPost')
        ->name('ajax.admin.categoryAddPost');
});

