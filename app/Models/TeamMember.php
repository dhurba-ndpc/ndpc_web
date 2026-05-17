<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'name_en',
        'name_ne',
        'designation_en',
        'designation_ne',
        'position_en',
        'position_ne',
        'organization_involvement_en',
        'organization_involvement_ne',
        'type',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
