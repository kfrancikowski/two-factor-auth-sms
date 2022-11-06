<?php

namespace Kfrancikowski\TwoFactorAuthSms\Providers;

interface TwoFactorAuthSmsProviderInterface
{
    public function getName(): string;
    public function sendAuthCode(string $from, string $to, string $code): void;
}
