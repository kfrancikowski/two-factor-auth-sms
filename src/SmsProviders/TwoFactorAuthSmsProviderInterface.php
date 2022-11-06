<?php

namespace Kfrancikowski\TwoFactorAuthSms\SmsProviders;

interface TwoFactorAuthSmsProviderInterface
{
    public function getName(): string;
    public function sendAuthCode(string $to, string $code): void;
}
