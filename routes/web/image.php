<?php

/**
 * Dynamic image resizer routes
 */

//http://laravel.local/image/resize/600/400/rwerwerwerwerwerwer.jpg

/**
 * Routes for image modification
 */

Route::group(['prefix' => 'image'], function() {
    Route::get('resize/{width}/{height}/{path}', 'ImagesController@resize')
        ->where([
            'width' => '\d+',
            'height' => '\d+',
            'path' => '[\w\.]+',
        ]);

    Route::get('fit/{width}/{height}/{path}', 'ImagesController@fit')
        ->where([
            'width' => '\d+',
            'height' => '\d+',
            'path' => '[\w\.]+',
        ]);

    Route::get('widen/{width}/{path}', 'ImagesController@widen')
        ->where([
            'width' => '\d+',
            'path' => '[\w\.]+',
        ]);

    Route::get('heighten/{height}/{path}', 'ImagesController@heighten')
        ->where([
            'height' => '\d+',
            'path' => '[\w\.]+',
        ]);
});
