<?php

namespace App\Providers;

use ATehnix\VkClient\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
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

        $this->app->singleton(Auth::class, function ($app) {
            return new Auth(
                config('vk-requester.connect.client_id'),
                config('vk-requester.connect.secret_key'),
                config('vk-requester.connect.redirect_uri')
            );
        });
    }
}
