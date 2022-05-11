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
            $this->publishViews();
            $this->publishAssets();
            $this->bootCommands();
        }

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
     * Publish method for config
     * 
     * @return void
     */
    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('laravel-components.php'),
        ], 'laravel-components-config');
    }

    /**
     * Publish method for views
     * 
     * @return void
     */
    protected function publishViews()
    {
        $this->publishes([
            __DIR__.'/../src/View/Components/' => app_path('View/Components'),
            __DIR__.'/../resources/views/components/' => resource_path('views/vendor/components'),
        ], 'laravel-components-view-components');
    }

    /**
     * Publish the assets
     * 
     * @return void
     */
    protected function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../dist' => public_path($this->app->config['laravel-components.public-folder']),
        ], 'laravel-components-assets');
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

    /**
     * Load the comands
     * 
     * @return void
     */
    public function bootCommands()
    {
        $this->commands(
            $this->app->config['laravel-components.commands']
        );
    }
}