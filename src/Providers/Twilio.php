<?php

namespace Kfrancikowski\TwoFactorAuthSms\Providers;

use Twilio\Rest\Client;

class Twilio extends Provider
{
    public function __construct()
    {
        $this->name = 'Twilio';
    }

    public function sendAuthCode(string $to, string $code): void
    {
        $client = new Client(config('twofactorauthsms.providers.twilio.sid'), config('twofactorauthsms.providers.twilio.token'));

        $client->messages->create($to, [
            'from' => config('twofactorauthsms.from'),
            'body' => $this->getContent($code),
        ]);
    }
}
