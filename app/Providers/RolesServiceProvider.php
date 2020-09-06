<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {        
        Blade::if('role', function($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
