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
        
        // Load Views
        $this->loadViewsFrom(__DIR__.'/../views/full-Admin-Panel', 'larpack');
        
        // Load Migrations
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        
        // Load Middleware (if needed, register it in Kernel manually)

        // Publish Config
        $this->publishes([
            __DIR__.'/../config/larpack.php' => config_path('larpack.php'),
        ], 'config');
    }
}
