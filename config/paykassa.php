<?php

return [
    'merchant_id' => env('PAYKASSA_MERCHANT_ID'),
    'merchant_password' => env('PAYKASSA_MERCHANT_PASSWORD'),
    'api_id' => env('PAYKASSA_API_ID'),
    'api_password' => env('PAYKASSA_API_PASSWORD'),
    'test_mode' => env('PAYKASSA_TEST_MODE', false),
];