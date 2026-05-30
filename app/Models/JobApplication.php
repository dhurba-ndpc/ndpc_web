<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        
    ];

    protected $casts = [
        'is_agreed' => 'boolean',
    ];
}
