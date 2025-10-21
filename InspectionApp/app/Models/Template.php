<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'created_by',
        'name',
        'category',
        'description',
        'fields',
        'is_public',
        'is_active',
        'usage_count',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'fields' => 'array',
            'is_public' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }

    public function incrementUsage(): void
    {
        $this->increment('usage_count');
    }

    public function isActive(): bool
    {
        return $this->is_active && $this->status === 'active';
    }
}
