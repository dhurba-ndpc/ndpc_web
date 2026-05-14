<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyGoal extends Model
{
    protected $fillable = [
        'badge_title_en',
        'badge_title_ne',
        'description_en',
        'description_ne',
        'image',
        'is_active',
    ];
}
