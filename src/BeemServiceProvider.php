<?php

namespace Tomsgad\Beem;

use Tomsgad\Beem\OTP\Beem as OTP;
use Tomsgad\Beem\SMS\Beem as SMS;
use Illuminate\Support\ServiceProvider;
use Tomsgad\Beem\Airtime\Beem as AirtimeAirtime;
use Illuminate\Support\Facades\Notification;
use Tomsgad\Beem\OTP\BeemChannel as BeemOtpChannel;
use Tomsgad\Beem\SMS\BeemChannel as BeemSmsChannel;
use Tomsgad\Beem\Airtime\BeemChannel as BeemAirtimeChannel;

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
    	/* Config File */
        $this->mergeConfigFrom(__DIR__.'/../config/beem.php', 'beem');

        /* SMS Feature */
        Notification::extend('beem', function ($app) {
            return new BeemSmsChannel(
                $this->app->make(SMS::class)
            );
        });

        $this->app->bind(SMS::class, static function ($app) {
            return new SMS($app['config']['beem']);
        });

        /* OTP Feature */
        $this->app->bind('otp', function ($app) {
            return new BeemOtpChannel(
                $this->app->make(OTP::class)
            );
        });

        $this->app->bind(OTP::class, static function ($app) {
            return new OTP($app['config']['beem']);
        });

        /* Airtime Feature */
        $this->app->bind('airtime', function ($app) {
            return new BeemAirtimeChannel(
                $this->app->make(Airtime::class)
            );
        });

        $this->app->bind(Airtime::class, static function ($app) {
            return new Airtime($app['config']['beem']);
        });
    }
}
