<?php

namespace Kfrancikowski\TwoFactorAuthSms\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Kfrancikowski\TwoFactorAuthSms\TwoFactorAuthSms;

trait HasTwoFactorAuthSms
{
    public function twoFactorSmsCodes(): MorphMany
    {
        return $this->morphMany(Users2faSms::class, 'authenticatable');
    }

    public function sendSmsAuthCode(string $phone): void
    {
        $twoFactorAuthSms = new TwoFactorAuthSms();
        $twoFactorAuthSms->sendCodeTo($this, $phone);
    }
}
