<?php

/**
 * Роуты для работы в админ-панели
 */
Route::group(['prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Admin', 'middleware' => 'admin:admin_access'], function () {

        /**
         * Главная страница
         */
        Route::get('/', 'AdminController@index')
            ->name('admin');

        /**
         * Пользователи
         */
        Route::group(['prefix' => 'users', 'middleware' => 'admin:users_management'], function () {

            /**
             * Главная (список активных)
             */
            Route::get('/', 'UsersController@users')
                ->name('admin.users');

            /**
             * Создание нового пользователя
             */
            Route::get('/create', 'UsersController@userCreate')
                ->name('admin.user.create');

            Route::post('/create', 'UsersController@userCreatePost')
                ->name('admin.user.createPost');

            /**
             * Редактирование пользователя
             */
            Route::get('/edit/{id}', 'UsersController@userEdit')
                ->name('admin.user.edit');

            Route::post('/edit/{id}', 'UsersController@userEditPost')
                ->name('admin.user.editPost');

            /**
             * Безвозвратное удаление пользователя
             */
            Route::get('/delete/{id}', 'UsersController@userDelete')
                ->name('admin.user.delete');
        });

        /**
         * Компании/Бренды
         */
        Route::group(['prefix' => 'brands', 'middleware' => 'admin:brand_management'], function () {

            /**
             * Главная (список активных)
             */
            Route::get('/', 'BrandsController@brands')
                ->name('admin.brands.active');

            /**
             * Главная (список удаленных)
             */
            Route::get('/trashed', 'BrandsController@trashed')
                ->name('admin.brands.trashed');

            /**
             * Создание нового бренда
             */
            Route::get('/create', 'BrandsController@brandCreate')
                ->name('admin.brands.create');

            Route::post('/create', 'BrandsController@brandCreatePost')
                ->name('admin.brands.createPost');

            /**
             * Редактирование бренда
             */
            Route::get('/edit/{id}', 'BrandsController@brandEdit')
                ->name('admin.brands.edit');

            Route::post('/edit/{id}', 'BrandsController@brandEditPost')
                ->name('admin.brands.editPost');

            /**
             * Мягкое удаление бренда (перемещение в раздел "Удаленные")
             */
            Route::get('/trash/{id}', 'BrandsController@brandTrash')
                ->name('admin.brands.trash');

            /**
             * Восстановление бренда из раздела "Удаленные"
             */
            Route::get('/restore/{id}', 'BrandsController@brandRestore')
                ->name('admin.brands.restore');

            /**
             * Безвозвратное удаление бренда
             */
            Route::get('/delete/{id}', 'BrandsController@brandDelete')
                ->name('admin.brands.delete');
        });

        /**
         * Акции
         */
        Route::group(['prefix' => 'actions', 'middleware' => 'admin:actions_management'], function () {

            /**
             * Главная (список активных)
             */
            Route::get('/', 'ActionsController@actions')
                ->name('admin.actions.active');
            /**
             * Главная (список удаленных)
             */
            Route::get('/trashed', 'ActionsController@trashed')
                ->name('admin.actions.trashed');
            /**
             * Создание новой акции
             */
            Route::get('/create', 'ActionsController@actionCreate')
                ->name('admin.actions.create');

            Route::post('/create', 'ActionsController@actionCreatePost')
                ->name('admin.actions.createPost');

            /**
             * Редактирование акции
             */
            Route::get('/edit/{id}', 'ActionsController@actionEdit')
                ->name('admin.actions.edit');

            Route::post('/edit/{id}', 'ActionsController@actionEditPost')
                ->name('admin.actions.editPost');

            /**
             * Мягкое удаление акции(перемещение в раздел "Удаленные")
             */
            Route::get('/trash/{id}', 'ActionsController@actionTrash')
                ->name('admin.actions.trash');

            /**
             * Восстановление бренда из раздела "Удаленные"
             */
            Route::get('/restore/{id}', 'ActionsController@actionRestore')
                ->name('admin.actions.restore');

            /**
             * Безвозвратное удаление бренда
             */
            Route::get('/delete/{id}', 'ActionsController@actionDelete')
                ->name('admin.actions.delete');
        });

        /**
        * Контент, полученный с помощью парсера
         */
        Route::group(['prefix' => 'content'], function () {

            /**
             * Таблица данных, полученных из парсера
             */
            Route::get('/', 'ContentController@content')
                ->name('admin.content.get_all');

            /**
             * Роут для извлечения данных из парсера во временную таблицу
             */
            Route::post('/', 'ContentController@VKFeedDownload')
                ->name('admin.content.download');

            /**
             * роут для jquery - button.js,
             * Insert копирует запись из временной таблицы в таблицу Акции
             * и мягко удаляет данную запись
             */
            Route::get('/insert/{id}', 'ContentController@insert')
                ->name('admin.content.insert');

            /**
             * Delete мягко удаляет запись из временной таблицы
             */
            Route::get('/delete/{id}', 'ContentController@delete')
                ->name('admin.content.delete');
        });


        /**
         * Логи парсера
         */
        Route::get('/logs', 'AdminController@logs')
            ->name('admin.logs');

        /**
         * Поисковые запросы
         */
        Route::get('/queries', 'QueriesController@queries')
            ->name('admin.queries');
    });

});


