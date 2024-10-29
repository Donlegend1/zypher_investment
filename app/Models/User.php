<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens, Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password',
        'suspended',
        'referral_code',
        'referred_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function referredBy()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }
    public function currentPlan()
    {
        return $this->belongsTo(Plan::class, 'current_plan');
    }

    // Relationship to get the users referred by this user
    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
    
    public function completedDeposits()
    {
        return $this->transactions()->where('operation', 'Deposit')->where('status', 'Completed');
    }

  

    public function completedWithdrawals()
    {
        return $this->withdrawals()->where('status', 'Completed');
    }
    
    public static function generateReferralCode()
    {
        do {
            $code = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
        } while (self::where('referral_code', $code)->exists());

        return $code;
    }

}