<?php

namespace Andresdevr\LaravelComponents;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-components');
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-components.php'),
            ], 'config');

        }

        Route::name($this->app->config['laravel-components.route.name'])
                ->middleware($this->app->config['laravel-components.route.middlewares'])
                ->prefix($this->app->config['laravel-components.route.prefix'])
                ->group(fn () => $this->loadRoutesFrom(__DIR__ . '/../routes/web.php'));
    }
}