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
        $this->registerConfig();
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
        }

        $this->bootRoutes();
        $this->bootViews();
    }


    /**
     * Load the config
     * 
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-components');
    }

    /**
     * Publish method
     * 
     * @return void
     */
    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('laravel-components.php'),
        ], 'config');
    }

    /**
     * Load the routes
     * 
     * @return void
     */
    protected function bootRoutes()
    {
        Route::name($this->app->config['laravel-components.asset-route.name'])
            ->middleware($this->app->config['laravel-components.asset-route.middlewares'])
            ->prefix($this->app->config['laravel-components.asset-route.prefix'])
            ->group(fn () => $this->loadRoutesFrom(__DIR__ . '/../routes/web.php'));
    }

    /**
     * Load the views
     * 
     * @return void
     */
    protected function bootViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-components');
    }
}