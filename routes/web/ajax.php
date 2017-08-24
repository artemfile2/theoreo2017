<?php

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/

/* Ajax для Админки */

Route::group(['namespace' => 'Admin', 'prefix' => 'ajax', 'middleware' => 'admin:admin_access'],function () {

    Route::post('/admin/category/add', 'AjaxController@categoryAddPost')
        ->name('ajax.admin.categoryAddPost');

    Route::post('/admin/tag/add', 'AjaxController@tagAddPost')
        ->name('ajax.admin.tagAddPost');
});



