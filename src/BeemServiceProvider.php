<?php

namespace Tomsgad\Beem;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Tomsgad\Beem\SMS\Beem;
use Tomsgad\Beem\SMS\BeemChannel;

class BeemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/beem.php' => config_path('beem.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/beem.php', 'beem');

        Notification::extend('beem', function ($app) {
            return new BeemChannel(
                $this->app->make(Beem::class)
            );
        });

        $this->app->bind(Beem::class, static function ($app) {
            return new Beem($app['config']['beem']);
        });
    }
}
