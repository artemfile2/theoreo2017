<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Client'],function () {
    Route::get('/', 'PageController@index')->name('client.index');

    Route::get('/action/{action}', 'PageController@action')->name('showAction');

    Route::get('/category/{category}', 'PageController@showCategory')->name('showCategory');

    Route::get('/archives', 'PageController@showArchives')->name('client.showArchives');

    Route::get('/same/{action}', 'PageController@showSameActions')->name('client.showSameActions');

    Route::group(['prefix' => 'sort-by'],function () {

        Route::get('/{category}/category:{sort}', 'PageController@showCategory')->name('client.sortCategoryActions');

        Route::get('/status:{sort}', 'PageController@filterByStatus')->name('client.filterByStatus');

        Route::get('/tag:{sort}', 'PageController@filterByTag')->where('tag', '[0-9]+')->name('client.filterByTag');

        Route::get('/brand:{sort}', 'PageController@filterByBrand')->where('tag', '[0-9]+')->name('client.filterByTag');

    });
});