<?php

namespace Kfrancikowski\TwoFactorSms\SmsProviders;

use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;
use Smsapi\Client\Curl\SmsapiHttpClient;

class SmsApiCom extends Provider
{
    public function __construct()
    {
        $this->name = 'SmsApiCom';
    }

    public function sendAuthCode(string $to, string $code): void
    {
        $client = new SmsapiHttpClient();

        $client->smsapiComService(config('twofactorsms.providers.smsapicom.token'))
            ->smsFeature()
            ->sendSms(SendSmsBag::withMessage($to, $this->getContent($code)));
    }
}
