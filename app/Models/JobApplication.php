<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    protected $fillable = [
        'vacancy_id',
        'full_name',
        'email',
        'phone_number',
        'file',
        'why_hire_you',
        'is_agreed',
        'application_type',
        'interested_position',
        'read_at',
        
    ];

    protected $casts = [
        'is_agreed' => 'boolean',
        'read_at' => 'datetime',
    ];

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }
}
