<?php

/*
|--------------------------------------------------------------------------
| Parser Routes
|--------------------------------------------------------------------------
*/
/* Требуется авторизация */
Route::group(['prefix' => 'parser'],function () {

    Route::get('/', function () {
        return view('parser.main');
    })->name('parser');

    /** тестовый маршрут для парсера */
    Route::get('/vk', 'VkController@newsFeedGet')->name('vk');

    /** тестовый маршрут для простого парсера */
    Route::get('/vksimple', 'VkController@simpleNewsFeedGet')->name('vksimple');

    Route::get('/vkauth', 'VkController@auth')->name('vkauth');
});