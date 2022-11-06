<?php

namespace Kfrancikowski\TwoFactorAuthSms;

use Illuminate\Support\ServiceProvider;

class TwoFactorAuthSmsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/twofactorauthsms.php' => config_path('twofactorauthsms.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'twofactorauthsms');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('twofactorauthsms'),
        ]);
    }
}
