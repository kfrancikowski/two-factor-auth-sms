<?php

namespace Kfrancikowski\TwoFactorSms\SmsProviders;

interface TwoFactorSmsProviderInterface
{
    public function getName(): string;
    public function sendAuthCode(string $to, string $code): void;
}
