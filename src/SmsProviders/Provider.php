<?php

namespace Kfrancikowski\TwoFactorSms\SmsProviders;

abstract class Provider implements TwoFactorSmsProviderInterface
{
    protected string $name;

    protected function getContent(string $code): string
    {
        return __('twofactorsms.message', ['code' => $code]);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
