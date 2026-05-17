<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeQuarter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employee_quarter_title_en',
        'employee_quarter_title_ne',
        'image',
        'name_en',
        'name_ne',
        'designation_en',
        'designation_ne',
        'quarter',
        'year',
        'description_en',
        'description_ne',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
