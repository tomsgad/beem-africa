<?php

namespace Tomsgad\BeemAfrica;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Tomsgad\BeemAfrica\SMS\BeemAfrica;
use Tomsgad\BeemAfrica\SMS\BeemAfricaChannel;

class BeemAfricaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/beem-africa.php' => config_path('beem-africa.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/beem-africa.php', 'beem-africa');

        Notification::extend('beem-africa', function ($app) {
            return new BeemAfricaChannel(
                $this->app->make(BeemAfrica::class)
            );
        });

        $this->app->bind(BeemAfrica::class, static function ($app) {
            return new BeemAfrica($app['config']['beem-africa']);
        });
    }
}
