<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'plan_name',
        'price',
        'billing_cycle',
        'status',
        'start_date',
        'end_date',
        'next_billing_date',
        'max_users',
        'max_properties',
        'max_inspections_per_month',
        'features',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'next_billing_date' => 'date',
        'features' => 'array',
        'price' => 'decimal:2',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isTrial()
    {
        return $this->status === 'trial';
    }
}
