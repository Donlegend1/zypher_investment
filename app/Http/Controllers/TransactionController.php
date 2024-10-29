<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Withdrawal;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountFunded;
use App\Mail\WithdrawalCompleted;
use App\Mail\AmountDeducted;


class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Transaction::with('user')->where('operation', "Deposit")->paginate(10);
        foreach ($deposits as $deposit) {
            $depositDate = Carbon::parse($deposit->date);
            $expiryDate = $depositDate->addDays(30); // Assuming the deposit expires in 30 days
            $remainingDays = Carbon::now()->diffInDays($expiryDate, false);
            $deposit->remaining_days = $remainingDays > 0 ? $remainingDays : 0;
        }
        return view('dashboard.admin.deposits.list', compact('deposits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $referrals = User::with('referrals')->get();
        $referrals = User::with(['referrals' => function ($query) {
            $query->with(['transactions' => function ($q) {
                $q->where('operation', 'Deposit');
            }]);
        }])->get();

        // Calculate gains
        $referrals->each(function ($user) {
            $user->totalGain = 0; // Initialize total gain for the user
            $user->referrals->each(function ($referral) use ($user) {
                $referral->gains = $referral->transactions->map(function ($transaction, $index) use ($user) {
                    if ($index == 0) {
                        $gainPercentage = 0.05;
                    } elseif ($index == 1) {
                        $gainPercentage = 0.03;
                    } else {
                        $gainPercentage = 0.02;
                    }
                    $gain = $transaction->amount * $gainPercentage;
                    $user->totalGain += $gain; // Add gain to the referring user's total gain
                    return $gain;
                });
            });
        });
        return view('dashboard.admin.referrals.list', compact('referrals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function withdrawals()
    {
        //
        $withdrawals = Withdrawal::with('user')
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        // dd($withdrawals);
        return view('dashboard.admin.withdrawals.list', compact('withdrawals'));
    }

public function fundAccount(Request $request)
{
    // Validate the request data
    $request->validate([
        'user_id' => 'required|integer|exists:users,id',
        'fund_amount' => 'required|numeric|min:0',
        // 'payment_method' => 'required|string|max:255',
    ]);

    $userId = $request->input('user_id');
    $fundAmount = $request->input('fund_amount');
     $reference = $request->input('reference');
    $plan = $request->input('plan');

    

    $paymentMethod = "USD";
    $date = now();
    $operation = 'Deposit';
    $status = 'Completed';

    // Begin a transaction
    DB::beginTransaction();

    try {
        // If funding amount is provided, create a deposit transaction
        if ($fundAmount > 0) {
            // Create a new transaction record
            $transaction = Transaction::create([
                'user_id' => $userId,
                'date' => $date,
                'operation' => $operation,
                'payment_method' => $paymentMethod,
                'amount' => $fundAmount,
                'reference' => $reference,  
                'status' => $status,
            ]);

            // Update the user's current balance
           $user= User::where('id', $userId)->increment('current_balance', $fundAmount);
           

            // Send email with transaction details
            $user = User::find($userId);
             if($plan) {
                $user->current_plan=$plan;
                $user->save();
            }
            Mail::to($user->email)->send(new AccountFunded($transaction, $user));
        }

        // Commit the transaction
        DB::commit();

        return redirect()->back()->with('message', 'Account funded successfully!');
    } catch (Exception $e) {
        // Rollback the transaction
        DB::rollBack();

        return redirect()->back()->with('message', 'Failed to fund account: ' . $e->getMessage());
    }
}
    public function deductAmount(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'deduct_amount' => 'required|numeric|min:0',
        ]);

        $userId = $request->input('user_id');
        $deductAmount = $request->input('deduct_amount');

        try {
            // Fetch the user data along with the current balance using left joins
            $user = User::leftJoin('users as ref', 'users.referred_by', '=', 'ref.id')
            ->leftJoin('transactions as d', function ($join) {
                $join->on('users.id', '=', 'd.user_id')
                ->where('d.operation', 'Deposit')
                ->where('d.status', 'Completed');
            })
                ->leftJoin('withdrawals as w', function ($join) {
                    $join->on('users.id', '=', 'w.user_id')
                    ->where('w.status', 'Completed');
                })
                ->select(
                    'users.*',
                    'ref.id as referred_by_id',
                    'ref.full_name as referred_by_name',
                    DB::raw('IFNULL(SUM(d.amount), 0) as total_deposit'),
                    DB::raw('IFNULL(SUM(w.amount), 0) as total_withdrawal'),
                    DB::raw('IFNULL(SUM(d.amount), 0) - IFNULL(SUM(w.amount), 0) as current_balance')
                )
                ->groupBy('users.id')
                ->find($userId);

            if (!$user) {
                return redirect()->back()->with('message', 'User not found.');
            }

            $currentBalance = $user->current_balance;

            // Check if the deduction amount is less than or equal to the current balance
            if ($deductAmount <= $currentBalance) {
                DB::beginTransaction();

                // Deduct the amount
                $withdrawal = Withdrawal::create([
                    'user_id' => $userId,
                    'amount' => $deductAmount,
                    'status' => 'Completed',
                ]);

                // Update the user's current balance
                User::where('id', $userId)->decrement('current_balance', $deductAmount);

                // Send email with transaction details
                Mail::to($user->email)->send(new AmountDeducted($withdrawal, $user));

                DB::commit();

                return redirect()->back()->with('message', 'Amount deducted successfully!');
            } else {
                return redirect()->back()->with('message', 'Insufficient balance.');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', 'Failed to deduct amount: ' . $e->getMessage());
        }
    }

    public function updateWithdrawalStatus(Request $request)
    {
        // Validate the request data
        $request->validate([
            'withdrawal_id' => 'required|integer|exists:withdrawals,id',
            'status' => 'required|string|max:255',
            'transaction_reference' => 'nullable|string',
        ]);

        $withdrawalId = $request->input('withdrawal_id');
        $status = $request->input('status');
        $reference = $request->input('transaction_reference');

        // Find the withdrawal by ID and check its current status
        $withdrawal = Withdrawal::with('user')->where("id", $withdrawalId)->first();

        if ($withdrawal) {
            // Prevent changing the status if it is already 'Completed'
            if ($withdrawal->status === 'Completed') {
                return redirect()->back()->with('message', 'The withdrawal status cannot be changed once it is marked as completed.');
            }

            // Update the status and reference
            $withdrawal->status = $status;
            $withdrawal->reference = $reference;

            // Save the withdrawal
            $withdrawal->save();

            // Check if the status is 'Completed'
            if ($status == 'Completed') {
                // Deduct the withdrawal amount from the user's current balance
                $user = $withdrawal->user;
                $user->current_balance -= $withdrawal->amount;
                $user->save();

                // Send email with transaction details
                Mail::to($user->email)->send(new WithdrawalCompleted($withdrawal));
            }

            return redirect()->back()->with('message', 'Withdrawal status updated successfully.');
        } else {
            return redirect()->back()->with('message', 'Withdrawal not found.');
        }
    }

    public function generateProfits()
    {
        // Get all users with active investments
        $users = User::whereNotNull('current_plan')->get();

        foreach ($users as $user) {
            // Fetch the user's total deposits, withdrawals, and profits
            $totalDeposit = Transaction::where('user_id', $user->id)
                ->where('operation', 'Deposit')
                ->where('status', 'Completed')
                ->sum('amount');

            $totalWithdrawal = Withdrawal::where('user_id', $user->id)
                ->where('status', 'Completed')
                ->sum('amount');

            $totalProfit = Transaction::where('user_id', $user->id)
                ->where('operation', 'Profit')
                ->where('status', 'Completed')
                ->sum('amount');

            // Calculate the current balance
            $currentBalance = $totalDeposit - $totalWithdrawal + $totalProfit;

            // Update the user's current balance
            $user->current_balance = $currentBalance;
            $user->save();

            // Get the user's current investment plan details
            $investmentPlan = Plan::find($user->current_plan);
            if ($investmentPlan) {
                // Calculate the daily profit based on the investment plan
                $dailyProfit = ($currentBalance * $investmentPlan->interest_rate / 100);

                // Create a new transaction for profit
                Transaction::create([
                    'user_id' => $user->id,
                    'amount' => $dailyProfit,
                    'operation' => 'Profit',
                    'status' => 'Completed',
                    'payment_method' => 'USD',
                    'date' => now()
                ]);

                // Update the user's current balance by adding the daily profit
                $user->increment('current_balance', $dailyProfit);
                $user->save();
            }
        }

        return redirect()->back()->with('message', 'Profits generated for all users.');
    }

}