<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    //Permissões de usuarios 
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', fn($user) => $user->level === 'admin');
        Gate::define('editor', fn($user) => $user->level === 'editor');
        Gate::define('viewer', fn($user) => $user->level === 'viewer');
    }
}
