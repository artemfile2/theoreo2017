<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use ATehnix\VkClient\Auth;
use App\Models\Category;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::orderBy('name', 'ASC')
            ->get();
        View::share('categories', $categories);
        $tags = Tag::orderBy('name', 'ASC')
            ->get();
        View::share('tags', $tags);

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

        $this->app->singleton(Auth::class, function ($app) {
            return new Auth(
                config('vk-requester.connect.client_id'),
                config('vk-requester.connect.secret_key'),
                config('vk-requester.connect.redirect_uri')
            );
        });
    }
}
