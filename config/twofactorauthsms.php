<?php

return [
    'default_country_code' => env('2FA_SMS_DEFAULT_COUNTRY_CODE', '+48'),
    'default_provider' => env('2FA_SMS_DEFAULT_PROVIDER', 'twilio'),
    'failed_attempts_limit' => env('2FA_SMS_FAILED_ATTEMPTS_LIMIT', 5),
    'default_from' => env('2FA_SMS_DEFAULT_FROM', env('APP_NAME')),
    'providers' => [
        'twilio' => [
            'sid' => env('2FA_SMS_TWILIO_SID'),
            'token' => env('2FA_SMS_TWILIO_TOKEN'),
        ],
        'smsapi' => [
            'token' => env('2FA_SMS_SMSAPI_TOKEN')
        ]
    ]
];
