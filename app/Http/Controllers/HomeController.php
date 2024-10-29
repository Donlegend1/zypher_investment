<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1) {
            // Fetch data for dashboard cards
            $totalUsers = User::count();
            $totalSales = Transaction::where('operation', 'Deposit')
                ->where('status', 'Completed')
                ->sum('amount') ?? 0;
            $totalVisitors = 8765; // Placeholder value for visitors

            // Fetch users and their balances
            $users = User::leftJoin('users as ref', 'users.referred_by', '=', 'ref.id')
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
                    'users.id',
                    'users.full_name',
                    'users.email',
                    'users.current_plan',
                    'users.created_at',
                    'users.updated_at',
                    'users.current_balance',
                    'ref.id as referred_by_id',
                    'ref.full_name as referred_by_name',
                    DB::raw('IFNULL(SUM(d.amount), 0) as total_deposit'),
                    DB::raw('IFNULL(SUM(w.amount), 0) as total_withdrawal')
                )
                ->groupBy('users.id', 'ref.id', 'ref.full_name', 'users.current_balance')
                ->paginate(10);
            $totalWithdrwals = Withdrawal::where('status', 'completed')->sum('amount');
       

            return view('dashboard.home', compact('users', 'totalUsers', 'totalSales', 'totalVisitors', 'totalWithdrwals'));
        } else {
            if (!Auth::check()) {
                abort(403, 'User not logged in');
            }

            $user_id = Auth::id();

            // Fetch user's full name and current plan
            $user = DB::table('users')
                ->leftJoin('users as ref', 'users.referred_by', '=', 'ref.id')
                ->leftJoin('investment_plans as Userplan', 'users.current_plan', '=', 'Userplan.id')

                ->leftJoin(
                    DB::raw('(SELECT user_id, SUM(amount) as total_deposit FROM transactions WHERE operation = "Deposit" AND status = "Completed" GROUP BY user_id) as d'),
                    'users.id',
                    '=',
                    'd.user_id'
                )
                ->leftJoin(
                    DB::raw('(SELECT user_id, SUM(amount) as total_withdrawal FROM withdrawals WHERE status = "Completed" GROUP BY user_id) as w'),
                    'users.id',
                    '=',
                    'w.user_id'
                )
                ->leftJoin(
                    DB::raw('(SELECT user_id, SUM(amount) as total_profit FROM transactions WHERE operation = "Profit" GROUP BY user_id) as p'),
                    'users.id',
                    '=',
                    'p.user_id'
                )
                ->select(
                    'users.id',
                    'users.full_name',
                    'users.email',
                    'users.current_plan',
                    'users.current_balance',
                    'users.created_at',
                    'users.updated_at',
                    'ref.id as referred_by_id',
                    'Userplan.name as currentPlan',
                    'ref.full_name as referred_by_name',
                    DB::raw('IFNULL(d.total_deposit, 0) as total_deposit'),
                    DB::raw('IFNULL(w.total_withdrawal, 0) as total_withdrawal'),
                    DB::raw('IFNULL(p.total_profit, 0) as total_profit')
                )
                ->where('users.id', $user_id) // Select only the authenticated user
                ->first();
            $referrals = User::where('referred_by', Auth::user()->id)
            ->with(['transactions' => function ($query) {
                $query->where('operation', 'Deposit');
            }])
                ->get();

            // Calculate referral profits
            $totalProfitFromReferals= 0;
            $referrals->each(function ($user) use (&$totalProfitFromReferals) {
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

                $totalProfitFromReferals += $user->profit;
            });
            
            $Totalearnings = Transaction::where('user_id', Auth::user()->id)->where('operation', "Profit")->sum('amount');

            $referralsActiveCount = User::where('referred_by', Auth::user()->id)->count();
            $referredUserIds = User::where('referred_by', Auth::user()->id)->pluck('id');

            // Get the count of referred users who have made a deposit transaction
            $referralsWithDepositsCount = Transaction::whereIn('user_id', $referredUserIds)
                ->where('operation', 'Deposit')
                ->distinct('user_id')
                ->count('user_id');
            $lastReferredUser = User::where('referred_by', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->first();
            $totalWithdrwals = Withdrawal::where('status', 'completed')->where('user_id', Auth::user()->id)->sum('amount');
        


return view('dashboard.user.home', compact('user', 'totalProfitFromReferals', 'Totalearnings', 'referralsActiveCount', 'referralsWithDepositsCount', 'lastReferredUser', 'totalWithdrwals'));
}
}


}