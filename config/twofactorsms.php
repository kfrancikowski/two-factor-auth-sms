<?php

return [
    'default_country_code' => env('TWO_FACTOR_SMS_DEFAULT_COUNTRY_CODE', '+48'),
    'provider' => env('TWO_FACTOR_SMS_PROVIDER', 'twilio'),
    'failed_attempts_limit' => env('TWO_FACTOR_SMS_FAILED_ATTEMPTS_LIMIT', 5),
    'from' => env('TWO_FACTOR_SMS_FROM', env('APP_NAME')),
    'providers' => [
        'twilio' => [
            'sid' => env('TWO_FACTOR_SMS_TWILIO_SID'),
            'token' => env('TWO_FACTOR_SMS_TWILIO_TOKEN'),
        ],
        'smsapipl' => [
            'token' => env('TWO_FACTOR_SMS_SMSAPIPL_TOKEN')
        ],
        'smsapicom' => [
            'token' => env('TWO_FACTOR_SMS_SMSAPICOM_TOKEN')
        ]
    ]
];
