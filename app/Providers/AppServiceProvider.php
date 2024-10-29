<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Calculate the values
        $totalUsers = User::count();
        $totalSales = Transaction::where('operation', 'Deposit')
            ->where('status', 'Completed')
            ->sum('amount') ?? 0;
        $totalVisitors = 8765; // Placeholder value for visitors

        // Share the data with all views
        View::share([
            'totalUsers' => $totalUsers,
            'totalSales' => $totalSales,
            'totalVisitors' => $totalVisitors,
        ]);
    }
}