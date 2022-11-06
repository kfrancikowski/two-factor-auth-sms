<?php

namespace Kfrancikowski\TwoFactorAuthSms\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Kfrancikowski\TwoFactorAuthSms\TwoFactorAuthSms;

trait HasTwoFactorAuthSmsTrait
{
    public function twoFactorSmsCodes(): MorphMany
    {
        $this->morphMany(Users2faSms::class, 'authenticatable');
    }

    public function sendSmsAuthCode(string $phone): void
    {
        $twoFactorAuthSms = new TwoFactorAuthSms();
        $twoFactorAuthSms->sendCodeTo($this, $phone);
    }
}
