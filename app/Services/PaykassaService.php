<?php

namespace App\Services;

use Paykassa\PaykassaAPI;
use Paykassa\PaykassaSCI;

class PaykassaService
{
    protected $paykassaAPI;
    protected $paykassaSCI;

    public function __construct()
    {
        $this->paykassaAPI = new \Paykassa\PaykassaAPI(
            config('paykassa.api_id'),
            config('paykassa.api_password'),
            config('paykassa.test_mode')
        );

        $this->paykassaSCI = new \Paykassa\PaykassaSCI(
            config('paykassa.merchant_id'),
            config('paykassa.merchant_password'),
            config('paykassa.test_mode')
        );
    }

    public function sendMoney(array $params)
    {
        return $this->paykassaAPI->sendMoney(
            $params['merchant_id'],
            $params['wallet'],
            $params['amount'],
            $params['system'],
            $params['currency'],
            $params['comment'],
            $params['priority']
        );
    }

    public function createAddress(array $params)
    {
        return $this->paykassaSCI->createAddress(
            $params['system'],
            $params['currency'],
            $params['order_id'],
            $params['comment']
        );
    }
}