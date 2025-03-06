<?php

namespace Awaistech\Larpack;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use Awaistech\Larpack\Middleware\AuthChheck;
use Awaistech\Larpack\Middleware\CheckMaintenanceMode;
use Awaistech\Larpack\Middleware\RedirectIfLogin;
use Awaistech\Larpack\Middleware\SuperAdmin;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Merge package configuration
        $this->mergeConfigFrom(__DIR__ . '/config/larpack.php', 'larpack');
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Load Routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/superadmin.php');

        // Load Views
        $this->loadViewsFrom(__DIR__ . '/views/full-Admin-Panel', 'larpack');

        // Load Migrations
        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        // Publish Config
        $this->publishes([
            __DIR__ . '/config/larpack.php' => config_path('larpack.php'),
        ], 'larpack-config');

        // Publish Views (Optional)
        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/larpack'),
        ], 'larpack-views');

        // Publish Migrations (Optional)
        $this->publishes([
            __DIR__ . '/migrations/' => database_path('migrations'),
        ], 'larpack-migrations');

        // Register Middlewares
        $router = $this->app['router'];
        $router->aliasMiddleware('authchheck', AuthChheck::class);
        $router->aliasMiddleware('check.maintenance', CheckMaintenanceMode::class);
        $router->aliasMiddleware('redirect.if.login', RedirectIfLogin::class);
        $router->aliasMiddleware('super.admin', SuperAdmin::class);
    }
}
