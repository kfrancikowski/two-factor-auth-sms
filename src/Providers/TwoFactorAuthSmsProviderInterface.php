<?php

namespace Kfrancikowski\TwoFactorAuthSms\Providers;

interface TwoFactorAuthSmsProviderInterface
{
    public function getName(): string;
    public function sendCode(string $from, string $to, string $message): bool;
}
