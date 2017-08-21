<?php

/**
 * Роуты для работы с изображениями
 */
Route::group(['prefix' => 'image'], function() {
    /**
     * Непропорциональное изменение размеров изображения до заданных ширины и высоты.
     */
    Route::get('resize/{width}/{height}/{path}', 'ImagesController@resize')
        ->where([
            'width' => '\d+',
            'height' => '\d+',
            'path' => '[\w\.]+',
        ]);

    /**
     * Пропорциональное изменение размеров изображения до заданных ширины и высоты (пропорции сохраняются посредством
     * обрезки части изображения).
     */
    Route::get('fit/{width}/{height}/{path}', 'ImagesController@fit')
        ->where([
            'width' => '\d+',
            'height' => '\d+',
            'path' => '[\w\.]+',
        ]);

    /**
     * Пропорциональное изменение размеров изображения до заданной ширины.
     */
    Route::get('widen/{width}/{path}', 'ImagesController@widen')
        ->where([
            'width' => '\d+',
            'path' => '[\w\.]+',
        ]);

    /**
     * Пропорциональное изменение размеров изображения до заданной высоты.
     */
    Route::get('heighten/{height}/{path}', 'ImagesController@heighten')
        ->where([
            'height' => '\d+',
            'path' => '[\w\.]+',
        ]);
});
