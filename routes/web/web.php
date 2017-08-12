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

    Route::get('/sort_by/{sort}', 'PageController@filterBySort')->name('client.filterByStatus');

    Route::get('/category/{id}/sort_by/{sort}', 'PageController@showCategory')->name('client.sortCategoryActions');

    Route::get('/brand/{id}/sort_by/{sort}', 'PageController@filterByBrand')->name('client.filterByBrandSorted');

    Route::get('/tag/sort_by/{sort}', 'PageController@filterByTag')->name('client.filterByTagSorted');


    /* Поиск */

    Route::post('/search', 'PageController@search')->name('client.actionSearch');


});