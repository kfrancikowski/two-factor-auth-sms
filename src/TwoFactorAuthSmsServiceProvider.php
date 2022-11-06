<?php

namespace Kfrancikowski\TwoFactorAuthSms;

class TwoFactorAuthSmsServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/twofactorauthsms.php' => config_path('twofactorauthsms.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'twofactorauthsms');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/twofactorauthsms'),
        ]);
    }
}
