<?php

namespace App\Http\Controllers;

// use App\Services\PaykassaService;

use App\Models\Plan;
use App\Services\PaykassaSCI;
// use App\Services\PaykassaSCI;
use Illuminate\Http\Request;
use Cryptomus\Api\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentAPIController extends Controller
{

    // protected $paykassaService;

    // public function __construct(PaykassaService $paykassaService)
    // {
    //     $this->paykassaService = $paykassaService;
    // }

    // protected $paykassaService;

    // public function __construct(PaykassaService $paykassaService)
    // {
    //     $this->paykassaService = $paykassaService;
    // }

    // public function sendPayment(Request $request)
    // {
    //     $params = [
    //         'merchant_id' => config('paykassa.merchant_id'),
    //         'wallet' => [
    //             'address' => 'TTEAUAzhSFomrv9P7Q5AcqTchWHBq745gh',
    //             'tag' => '',
    //         ],
    //         'amount' => '5.123456',
    //         'system' => 'TRON_TRC20',
    //         'currency' => 'USDT',
    //         'comment' => 'My comment',
    //         'priority' => 'medium',
    //     ];

    //     $response = $this->paykassaService->sendMoney($params);

    //     if ($response['error']) {
    //         return response()->json(['error' => $response['message']], 400);
    //     } else {
    //         $data = $response['data'];
    //         $output = sprintf(
    //             'We have sent the %s %s %s to <a target="_blank" href="%s">%s</a>. The txid is <a target="_blank" href="%s">%s</a>',
    //             $data['system'],
    //             $data['amount'],
    //             $data['currency'],
    //             $data['explorer_address_link'],
    //             $data['number'],
    //             $data['explorer_transaction_link'],
    //             $data['txid']
    //         );

    //         return response()->json(['message' => $output, 'transaction_data' => $data]);
    //     }
    // }

    public function createAddress(Request $request)
    {
        $params = [
            'amount' => null,
            'system' => 'TRON_TRC20',
            'currency' => 'USDT',
            'order_id' => 'My order id ' . microtime(true),
            'comment' => 'My comment',
        ];

        $res = $this->paykassaService->createAddress($params);

        if ($res['error']) {
            return response()->json(['error' => true, 'message' => $res['message']]);
        } else {
            // Handle the success case as per your requirements
            $data = $res['data'];
            $addressDisplay = $data['is_tag']
            ? sprintf("address %s %s: %s", $data['wallet'], mb_convert_case($data['tag_name'], MB_CASE_TITLE), $data['tag'])
            : sprintf("address %s", $data['wallet']);

            $message = is_null($params['amount'])
            ? sprintf("Send money to %s %s.", $data['system'], htmlspecialchars($addressDisplay, ENT_QUOTES, 'UTF-8'))
            : sprintf("Send %s %s to %s %s.", $params['amount'], $data['currency'], $data['system'], htmlspecialchars($addressDisplay, ENT_QUOTES, 'UTF-8'));

            return response()->json(['message' => $message, 'data' => $data]);
        }
    }
  
    public function payment()
    {
        $PAYMENT_KEY = 'uQ4LFWCBE3dT84uQnt7ycL7p9WcSwjkSPQaZbik3ChoWO0egw51f4EAaZQKmefhPP0F1cX8OpRcl2c3HexNedoR7FGEYGA1mTgMPI8lzKl7Ct2I43R6SSC3gVDS3rkGX';
        $MERCHANT_UUID = 'c26b80a8-9549-4a66-bb53-774f12809249';

        // Initialize the Cryptomus client
        $paymentClient = new Client($PAYMENT_KEY, $MERCHANT_UUID);

        try {
            // Create payment data array
            $paymentData = [
                'amount' => 100, // specify the payment amount
                'currency' => 'USD', // or your preferred currency
                'order_id' => uniqid(), // a unique order ID
                'description' => 'Payment for Order #1234'
            ];

            // Execute the payment
            $response = $paymentClient->payment($paymentData);

            // Log the response
            \Log::info('Payment Response:', $response);

            return response()->json($response);
        } catch (\Exception $e) {
            \Log::error('Payment Error:', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Payment failed'], 500);
        }
    }


    public function mainDeposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'plan_id' => 'required|numeric|min:1',
            'address' => 'required',
        ]);

        $plan = Plan::where('id', $request->plan_id)->with('earningsSchedules')->first();

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'date' => now(),
            'operation' => 'Deposit',
            'payment_method' => 'USD',
            'amount' => $request->amount,
            'status' => 'Pending',
            'wallet_address' => $request->address,
        ]);

        if ($transaction) {
            // Send notification email to admin
            $adminEmail = 'test@zypherassets.com'; // Define admin email in config/mail.php
            Mail::to($adminEmail)->send(new AdminNotification($transaction, Auth::user(), $plan));

            return redirect()->back()->with('message' ,'request sent successfully');
        }
        
    } 
    
}