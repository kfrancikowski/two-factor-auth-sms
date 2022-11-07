<?php

namespace Kfrancikowski\TwoFactorSms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kfrancikowski\TwoFactorSms\Enums\TwoFactorSmsStatus;
use Kfrancikowski\TwoFactorSms\SmsProviders\Provider;
use Kfrancikowski\TwoFactorSms\SmsProviders\SmsApiCom;
use Kfrancikowski\TwoFactorSms\SmsProviders\SmsApiPl;
use Kfrancikowski\TwoFactorSms\SmsProviders\Twilio;

class TwoFactorSms
{
    private array $providers = [
        'smsapipl' => SmsApiPl::class,
        'smsapicom' => SmsApiCom::class,
        'twilio' => Twilio::class,
    ];

    public function sendCodeTo(Model $model, string $phone): void
    {
        $code = str_pad(rand(0, 999999), 5, '0', STR_PAD_LEFT);

        $user2faSms = $model->twoFactorSms()->create([
            'phone' => $phone,
            'code' => $code,
            'status' => TwoFactorSmsStatus::DRAFT,
        ]);
        
        if(empty(config('twofactorsms.provider'))) {
            throw new \Exception('Two-Factor provider is not defined. Add in in .env file.');
        }

        $provider = new $this->providers[config('twofactorsms.provider')];

        $this->send($user2faSms, $provider);
    }

    private function send(Models\TwoFactorSms $users2faSms, Provider $provider): void
    {
        $provider->sendAuthCode($users2faSms->phone, $users2faSms->code);

        $users2faSms->update([
            'status' => TwoFactorSmsStatus::SENT,
            'sent_at' => Carbon::now(),
        ]);
    }
}
