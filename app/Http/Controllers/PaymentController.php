<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createAndHandleInvoice(Request $request)
    {
        // Validate the request
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'plan_id' => 'required|numeric|min:1', // Assuming plan_id is passed in the request
        ]);

        $user = Auth::user();
        $price_amount = $request->amount;

        // Function to generate a unique order ID
        $order_id = uniqid('ORDER-', true);
        $price_currency = "usd";
        $order_description = "User deposit of $" . $price_amount;
        $ipn_callback_url = "https://zypherassets.com/home"; // This will remain for NowPayments to call back
        $success_url = "https://zypherassets.com/deposit";
        $cancel_url = "https://zypherassets.com/deposit";

        // Make the HTTP request to create the invoice
        $response = Http::withHeaders([
            'x-api-key' => 'Z4V8FKY-C3J4AJ8-PQMTBVK-YPJZHN8',
            'Content-Type' => 'application/json'
        ])->post('https://api.nowpayments.io/v1/invoice', [
            'price_amount' => $price_amount,
            'price_currency' => $price_currency,
            'order_id' => $order_id,
            'order_description' => $order_description,
            'ipn_callback_url' => $ipn_callback_url,
            'success_url' => $success_url,
            'cancel_url' => $cancel_url,
        ]);

        $response_data = $response->json();

        if (isset($response_data['invoice_url'])) {
            // Insert transaction into the database
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'date' => now(),
                'operation' => 'Deposit',
                'payment_method' => 'USD',
                'amount' => $price_amount,
                'status' => 'Pending',
                'order_id' => $order_id // Keep the order_id for reference
            ]);

            // Redirect the user to the invoice URL for payment
            return redirect($response_data['invoice_url']);
        } else {
            return back()->with('error', 'Error creating invoice: ' . $response_data['message']);
        }
    }

    // This method should still be available for NowPayments to call back
    public function handleIpn(Request $request)
    {
        // Get the raw POST data from NowPayments
        $raw_data = file_get_contents('php://input');
        $ipn_data = json_decode($raw_data, true);

        // Verify the IPN data
        if (isset($ipn_data['payment_status']) && $ipn_data['payment_status'] == 'finished') {
            $order_id = $ipn_data['order_id'];
            $amount = $ipn_data['price_amount'];
            $currency = $ipn_data['price_currency'];

            // Query to find the corresponding transaction by order_id
            $transaction = Transaction::where('order_id', $order_id)->first();

            if ($transaction) {
                // Update the deposit status in the transactions table
                $transaction->status = 'Completed';
                $transaction->save();

                // Assuming you want to update the user's current plan based on the deposit
                $current_plan = "5% daily for 30 days"; // Update this based on the actual plan

                // Update the user's current plan and current balance
                $user = User::find($transaction->user_id);
                if ($user) {
                    $user->current_plan = $current_plan;
                    $user->increment('current_balance', $amount);
                    $user->save();
                }
            }
        }
    }


    public function create(Request $request)
    {
        // Fetch investment plans with earnings schedules
        $investmentPlans = Plan::with('earningsSchedules')
        ->where('status', 1)
        ->paginate(10)
            ->through(function ($plan) {
                $plan->earning_days = $plan->earningsSchedules->pluck('earning_day')->implode(', ');
                return $plan;
            });

        // Fetch deposits for the authenticated user
        $deposits = Transaction::where('user_id', Auth::user()->id)
            ->where('operation', 'Deposit')
            ->get();
            // dd($deposits);

        // Calculate remaining days for each deposit
        foreach ($deposits as $deposit) {
            $depositDate = Carbon::parse($deposit->date);
            $expiryDate = $depositDate->addDays(30); // Assuming the deposit expires in 30 days
            $remainingDays = Carbon::now()->diffInDays($expiryDate, false);
            $deposit->remaining_days = $remainingDays > 0 ? $remainingDays : 0;
        }

        // Pass data to the view
        return view('dashboard.user.deposit', compact('deposits', 'investmentPlans'));
    }


    
}