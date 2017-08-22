<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use ATehnix\VkClient\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        include app_path('helpers.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->when('App\Http\Controllers\Client\PageController')
            ->needs('App\Repositories\ActionRepositoryInterface')
            ->give('App\Repositories\ActionClientRepository');

        $this->app->when('App\Http\Controllers\Admin\ActionsController')
            ->needs('App\Repositories\ActionRepositoryInterface')
            ->give('App\Repositories\ActionAdminRepository');

        $this->app->when('App\Http\Controllers\Admin\UsersController')
            ->needs('App\Repositories\ActionRepositoryInterface')
            ->give('App\Repositories\UsersAdminRepository');

        $this->app->when('App\Http\Controllers\Admin\BrandsController')
            ->needs('App\Repositories\ActionRepositoryInterface')
            ->give('App\Repositories\BrandsAdminRepository');
    }
}
