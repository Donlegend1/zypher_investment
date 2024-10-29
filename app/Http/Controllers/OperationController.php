<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Withdrawal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalRequestMail;

class OperationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index()  {
        return view('dashboard.user.operation');
    }

    function withdraw()
    {

        $withdrawals
        =  Withdrawal::where('user_id', Auth::user()->id)->get();
        return view('dashboard.user.withdraw', compact('withdrawals'));
    }

    function withdrawRequest(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required',
            'address' => 'required',
        ]);

        $user = $request->user_id ? User::find($request->user_id) :Auth::user()->id;
        $currentBalance = $user->current_balance; // Assuming there's a 'balance' field in the users table

        if ($request->amount > $currentBalance) {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }

        $withdrawal = new Withdrawal();
        $withdrawal->user_id = $user->id;
        $withdrawal->amount = $request->amount;
        $withdrawal->currency = $request->currency;
        $withdrawal->address = $request->address;
        $withdrawal->save();

        

        // Send withdrawal request email
        Mail::to($user->email)->send(new WithdrawalRequestMail($withdrawal));

        return redirect()->back()->with('message', "Withdrawal request made");
    }
    function referal()
    {
        // Fetch users referred by the authenticated user with their deposit transactions
        $users = User::where('referred_by', Auth::user()->id)
            ->with(['transactions' => function ($query) {
                $query->where('operation', 'Deposit');
            }])
            ->get();

        // Calculate referral profits
        $users->each(function ($user) {
            $user->profit = $user->transactions->map(function ($transaction, $index) {
                if ($index == 0) {
                    $profitPercentage = 0.05;
                } elseif ($index == 1) {
                    $profitPercentage = 0.03;
                } else {
                    $profitPercentage = 0.02;
                }
                return $transaction->amount * $profitPercentage;
            })->sum();
        });
        return view('dashboard.user.referal', compact('users'));
    }

    
    
    //
}