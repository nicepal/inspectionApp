<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'industry_type',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'phone',
        'email',
        'website',
        'description',
        'status',
        'subscription_plan',
        'subscription_expires_at',
    ];

    protected function casts(): array
    {
        return [
            'subscription_expires_at' => 'datetime',
        ];
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }

    public function templates(): HasMany
    {
        return $this->hasMany(Template::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function hasActiveSubscription(): bool
    {
        if (!$this->subscription_expires_at) {
            return true;
        }
        return $this->subscription_expires_at->isFuture();
    }
}
