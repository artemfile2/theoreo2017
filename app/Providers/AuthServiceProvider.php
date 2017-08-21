<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\User' => 'App\Policies\AdminPanelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

        Gate::denies('admin_access');
    }
}
