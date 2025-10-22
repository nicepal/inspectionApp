<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'property_id',
        'area_id',
        'name',
        'asset_code',
        'asset_type',
        'category',
        'description',
        'status',
        'risk_level',
        'latitude',
        'longitude',
        'manufacturer',
        'model',
        'serial_number',
        'purchase_date',
        'warranty_expiry',
        'last_service_date',
        'next_service_date',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'warranty_expiry' => 'date',
        'last_service_date' => 'date',
        'next_service_date' => 'date',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(AssetPhoto::class);
    }

    public function primaryPhoto()
    {
        return $this->hasOne(AssetPhoto::class)->where('is_primary', true);
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(AssetAttribute::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(AssetNote::class);
    }

    public function urgentNotes(): HasMany
    {
        return $this->hasMany(AssetNote::class)->where('is_urgent', true)->where('is_resolved', false);
    }

    public function files(): HasMany
    {
        return $this->hasMany(AssetFile::class);
    }

    public function followUps(): MorphMany
    {
        return $this->morphMany(FollowUp::class, 'followable');
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isHighRisk(): bool
    {
        return $this->risk_level === 'high';
    }

    public function hasGPS(): bool
    {
        return !is_null($this->latitude) && !is_null($this->longitude);
    }
}
