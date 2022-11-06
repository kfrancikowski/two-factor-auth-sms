<?php

namespace Kfrancikowski\TwoFactorSms\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Kfrancikowski\TwoFactorSms\TwoFactorSms;
use \Kfrancikowski\TwoFactorSms\Models\TwoFactorSms as TwoFactorSmsModel;

trait HasTwoFactorSms
{
    public function twoFactorSms(): MorphMany
    {
        return $this->morphMany(TwoFactorSmsModel::class, 'authenticatable');
    }

    public function sendSmsAuthCode(string $phone): void
    {
        $twoFactorAuthSms = new TwoFactorSms();
        $twoFactorAuthSms->sendCodeTo($this, $phone);
    }
}
