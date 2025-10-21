<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'role',
        'phone',
        'status',
        'avatar',
        'address',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_login_at' => 'datetime',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class, 'inspector_id');
    }

    public function templates(): HasMany
    {
        return $this->hasMany(Template::class, 'created_by');
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'generated_by');
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isCompanyOwner(): bool
    {
        return $this->role === 'company_owner';
    }

    public function isManager(): bool
    {
        return $this->role === 'manager';
    }
}
