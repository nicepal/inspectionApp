<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inspection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'property_id',
        'client_id',
        'company_id',
        'inspector_id',
        'template_id',
        'inspection_number',
        'inspection_type',
        'scheduled_at',
        'completed_at',
        'status',
        'result',
        'notes',
        'checklist_data',
        'attachments',
        'score',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'completed_at' => 'datetime',
            'checklist_data' => 'array',
            'attachments' => 'array',
            'score' => 'decimal:2',
        ];
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function inspector(): BelongsTo
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isPassed(): bool
    {
        return $this->result === 'pass';
    }
}
