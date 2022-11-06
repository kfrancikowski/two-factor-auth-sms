<?php

namespace Kfrancikowski\TwoFactorSms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kfrancikowski\TwoFactorSms\Enums\TwoFactorSmsStatus;

/**
 * @property int $authenticatable_id
 * @property string $authenticatable_type
 * @property TwoFactorSmsStatus $status
 * @property string $code
 * @property string $phone
 * @property int $failed_attempts
 * @property ?Carbon $sent_at
 * @property ?Carbon $confirmed_at
 * @property Carbon $created_at
 * @property ?Carbon $updated_at
 */

class TwoFactorSms extends Model
{
    public $fillable = ['status', 'code', 'phone'];

    public $casts = [
        'authenticatable_id' => 'integer',
        'authenticatable_type' => 'string',
        'status' => TwoFactorSmsStatus::class,
        'code' => 'string',
        'failed_attempts' => 'integer',
        'sent_at' => 'datetime',
        'confirmed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
