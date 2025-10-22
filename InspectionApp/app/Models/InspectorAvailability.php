<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InspectorAvailability extends Model
{
    protected $table = 'inspector_availability';
    
    protected $fillable = [
        'company_id',
        'inspector_id',
        'date',
        'start_time',
        'end_time',
        'status',
        'type',
        'notes',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function inspector(): BelongsTo
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }

    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }

    public function isBusy(): bool
    {
        return $this->status === 'busy';
    }
}
