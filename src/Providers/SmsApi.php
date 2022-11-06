<?php

namespace Kfrancikowski\TwoFactorAuthSms\Providers;

use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;
use Smsapi\Client\Curl\SmsapiHttpClient;

class SmsApi extends Provider
{
    public function __construct()
    {
        $this->name = 'SmsApi';
    }

    public function sendAuthCode(string $to, string $code): void
    {
        $client = new SmsapiHttpClient();

        $client->smsapiComService(config('twofactorauthsms.providers.smsapi.token'))
            ->smsFeature()
            ->sendSms(SendSmsBag::withMessage($to, $this->getContent($code)));
    }
}
