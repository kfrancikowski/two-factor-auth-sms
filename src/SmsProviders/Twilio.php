<?php

namespace Kfrancikowski\TwoFactorSms\SmsProviders;

use Twilio\Rest\Client;

class Twilio extends Provider
{
    public function __construct()
    {
        $this->name = 'Twilio';
    }

    public function sendAuthCode(string $to, string $code): void
    {
        $client = new Client(config('twofactorsms.providers.twilio.sid'), config('twofactorsms.providers.twilio.token'));

        $client->messages->create($to, [
            'from' => config('twofactorsms.from'),
            'body' => $this->getContent($code),
        ]);
    }
}
