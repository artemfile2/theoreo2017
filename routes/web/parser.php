<?php

/*
|--------------------------------------------------------------------------
| Parser Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'parser'],function () {

    Route::get('/', function () {
        return view('parser.main');
    });

    /** тестовый маршрут для простого парсера */
    Route::get('/vksimple', 'VkController@simpleNewsFeedGet');

    /** получение токена */
    Route::get('/vktoken', 'VkController@getToken');
});