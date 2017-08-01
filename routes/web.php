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
})->name('home');

Route::get('/test', function () {
    return view('test');
});

/** тестовый маршрут для парсера */
Route::get('/vk', 'VkController@newsFeedGet')->name('vk');

/** тестовый маршрут для простого парсера */
Route::get('/vksimple', 'VkController@simpleNewsFeedGet');
Route::get('/auth', function (){
    return '<script>
                var hash_el=window.location.href.substring(window.location.href.indexOf("#")+1,window.location.href.length);
                var url = "'.route('auth').'/?" + hash_el;
                window.location.replace(url);
             </script>';
});

Route::get('/vkauth', 'VkController@auth')->name('auth');
