<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PageController@index')->name('client.index');

Route::get('/action/{action}', 'PageController@action')->name('showAction');

Route::get('/category/{category}', 'PageController@showCategory')->name('showCategory');

Route::get('/brand/{brand_id}', 'BrandController@sortByBrand')->name('client.brand.sortByBrand');

Route::get('/archives', 'PageController@showArchives')->name('client.showArchives');

Route::get('/same/{action}', 'PageController@showSameActions')->name('client.showSameActions');

Route::group(['prefix' => 'filter'],function () {

    Route::get('/sort:{sort}', 'PageController@sortByRating')->name('client.sortByRating');

    Route::get('/category/{category}/sort:{sort}', 'PageController@sortByRating')->name('client.sortByRating');

    Route::get('/tag/sort:{sort}', 'PageController@filterByTag')->where('tag', '[0-9]+')->name('client.filterByTag');

});
