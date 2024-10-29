<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarningsSchedule extends Model
{
    use HasFactory;
    protected $table = 'earnings_schedule';
    protected $fillable = [
        'plan_id',
        'earning_day',
    ];
    public function investmentPlan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}