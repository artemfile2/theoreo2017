<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('client.parts.header', 'App\Http\ViewComposers\HeaderComposer');
        $view->composer('client.parts.footer', 'App\Http\ViewComposers\FooterComposer');
    }

    public function register()
    {
        //
    }

}