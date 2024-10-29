<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'investment_plans';
    public function earningsSchedules()
    {
        return $this->hasMany(EarningsSchedule::class, 'plan_id');
    }

}