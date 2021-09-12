<?php

namespace SeniorX\SeniorX;

use Illuminate\Support\ServiceProvider;

class SeniorXServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/seniorx.php' => config_path('seniorx.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/seniorx.php', 'seniorx');


        // Register the service the package provides.
        $this->app->singleton('seniorx', function ($app) {
            return new Senior;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['seniorx'];
    }
}