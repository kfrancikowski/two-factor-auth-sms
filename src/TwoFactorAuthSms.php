<?php

namespace Kfrancikowski\TwoFactorAuthSms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kfrancikowski\TwoFactorAuthSms\Enums\TwoFactorSmsStatus;

class TwoFactorAuthSms
{
    public function sendCodeTo(Model $model, string $phone): void
    {
        $code = str_pad(rand(0, 999999), 5, '0', STR_PAD_LEFT);

        $user2faSms = $model->twoFactorSmsCodes()->create([
            'phone' => $phone,
            'code' => $code,
            'status' => TwoFactorSmsStatus::DRAFT,
        ]);
    }
}
