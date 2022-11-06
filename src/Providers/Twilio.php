<?php

namespace Kfrancikowski\TwoFactorAuthSms\Providers;

use Twilio\Rest\Client;

class Twilio extends Provider implements TwoFactorAuthSmsProviderInterface
{
    public function __construct()
    {
        $this->name = 'Twilio';
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function sendCode(string $from, string $to, string $message): bool
    {
        $client = new Client(config('twofactorauthsms.providers.twilio.sid'), config('twofactorauthsms.providers.twilio.token'));

        $client->messages->create($to, [
            'from' => $from,
            'body' => ''
        ]);
    }
}
