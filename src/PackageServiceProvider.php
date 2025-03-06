<?php

namespace Awaistech\Larpack;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/larpack.php', 'larpack');
    }

    public function boot()
    {
        // Load Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        
        // Load Views (Make sure your views are inside 'resources/views')
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'larpack');
        
        // Load Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Publish Config
        $this->publishes([
            __DIR__.'/../config/larpack.php' => config_path('larpack.php'),
        ], 'larpack-config');
    }
}
