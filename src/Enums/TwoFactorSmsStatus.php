<?php

namespace Kfrancikowski\TwoFactorAuthSms\Enums;

enum TwoFactorSmsStatus: string
{
    case DRAFT = 'draft';
    case SENT = 'sent';
    case BLOCKED = 'blocked';
    case CONFIRMED = 'confirmed';
}
