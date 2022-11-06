<?php

namespace Kfrancikowski\TwoFactorAuthSms\SmsProviders;

abstract class Provider implements TwoFactorAuthSmsProviderInterface
{
    protected string $name;

    protected function getContent(string $code): string
    {
        return __('twofactorauthsms.message', ['code' => $code]);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
