<?php

namespace Kfrancikowski\TwoFactorAuthSms\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Users2faSms extends Model
{
    public $fillable = ['status', 'code', 'phone'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
