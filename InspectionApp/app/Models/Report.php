<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'inspection_id',
        'company_id',
        'generated_by',
        'report_number',
        'title',
        'summary',
        'sections',
        'format',
        'file_path',
        'status',
        'generated_at',
        'recipients',
    ];

    protected function casts(): array
    {
        return [
            'sections' => 'array',
            'recipients' => 'array',
            'generated_at' => 'datetime',
        ];
    }

    public function inspection(): BelongsTo
    {
        return $this->belongsTo(Inspection::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function generator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'generated_by');
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isPDF(): bool
    {
        return $this->format === 'pdf';
    }
}
