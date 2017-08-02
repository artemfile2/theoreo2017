<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

/** тестовый маршрут для парсера */
Route::get('/vk', 'VkController@getToken');

/** тестовый маршрут для простого парсера */
Route::get('/vksimple', 'VkController@simpleNewsFeedGet');

Route::get('/vkauth', 'VkController@auth');

Route::get('/vktoken', 'VkController@getCode');