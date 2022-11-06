<?php

namespace Kfrancikowski\TwoFactorSms;

use Illuminate\Support\ServiceProvider;

class TwoFactorSmsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/twofactorsms.php' => config_path('twofactorsms.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'twofactorsms');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('twofactorsms'),
        ]);
    }
}
