<?php

namespace App\Http\Controllers;

use App\Services\PaykassaService;
use Illuminate\Http\Request;

class PaymentAPIController extends Controller
{
    protected $paykassaService;

    public function __construct(PaykassaService $paykassaService)
    {
        $this->paykassaService = $paykassaService;
    }

    public function sendPayment(Request $request)
    {
        $params = [
            'merchant_id' => config('paykassa.merchant_id'),
            'wallet' => [
                'address' => 'TTEAUAzhSFomrv9P7Q5AcqTchWHBq745gh',
                'tag' => '',
            ],
            'amount' => '5.123456',
            'system' => 'TRON_TRC20',
            'currency' => 'USDT',
            'comment' => 'My comment',
            'priority' => 'medium',
        ];

        $response = $this->paykassaService->sendMoney($params);

        if ($response['error']) {
            return response()->json(['error' => $response['message']], 400);
        } else {
            $data = $response['data'];
            $output = sprintf(
                'We have sent the %s %s %s to <a target="_blank" href="%s">%s</a>. The txid is <a target="_blank" href="%s">%s</a>',
                $data['system'],
                $data['amount'],
                $data['currency'],
                $data['explorer_address_link'],
                $data['number'],
                $data['explorer_transaction_link'],
                $data['txid']
            );

            return response()->json(['message' => $output, 'transaction_data' => $data]);
        }
    }
}