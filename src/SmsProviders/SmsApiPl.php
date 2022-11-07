<?php

namespace Kfrancikowski\TwoFactorSms\SmsProviders;

use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;
use Smsapi\Client\Curl\SmsapiHttpClient;

class SmsApiPl extends Provider
{
    public function __construct()
    {
        $this->name = 'SmsApiPl';
    }

    public function sendAuthCode(string $to, string $code): void
    {
        $client = new SmsapiHttpClient();

        $client->smsapiPlService(config('twofactorsms.providers.smsapipl.token'))
            ->smsFeature()
            ->sendSms(SendSmsBag::withMessage($to, $this->getContent($code)));
    }
}
