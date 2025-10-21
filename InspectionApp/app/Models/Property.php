<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'company_id',
        'name',
        'property_type',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'year_built',
        'square_footage',
        'floors',
        'description',
        'features',
        'attachments',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'attachments' => 'array',
            'latitude' => 'decimal:8',
            'longitude' => 'decimal:8',
            'square_footage' => 'decimal:2',
        ];
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
