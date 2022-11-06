<?php

namespace Kfrancikowski\TwoFactorAuthSms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kfrancikowski\TwoFactorAuthSms\Enums\TwoFactorSmsStatus;
use Kfrancikowski\TwoFactorAuthSms\Models\Users2faSms;
use Kfrancikowski\TwoFactorAuthSms\SmsProviders\Provider;
use Kfrancikowski\TwoFactorAuthSms\SmsProviders\SmsApi;
use Kfrancikowski\TwoFactorAuthSms\SmsProviders\Twilio;

class TwoFactorAuthSms
{
    private array $providers = [
        'smsapi' => SmsApi::class,
        'twilio' => Twilio::class,
    ];

    public function sendCodeTo(Model $model, string $phone): void
    {
        $code = str_pad(rand(0, 999999), 5, '0', STR_PAD_LEFT);

        $user2faSms = $model->twoFactorSmsCodes()->create([
            'phone' => $phone,
            'code' => $code,
            'status' => TwoFactorSmsStatus::DRAFT,
        ]);

        $provider = new $this->providers[config('twofactorauthsms.provider')];

        $this->send($user2faSms, $provider);
    }

    private function send(Users2faSms $users2faSms, Provider $provider): void
    {
        $provider->sendAuthCode($users2faSms->phone, $users2faSms->code);

        $users2faSms->update([
            'status' => TwoFactorSmsStatus::SENT,
            'sent_at' => Carbon::now(),
        ]);
    }
}
