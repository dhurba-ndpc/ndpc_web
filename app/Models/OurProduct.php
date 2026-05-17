<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurProduct extends Model
{
    protected $fillable = [
        'badge_title_en',
        'badge_title_ne',
        'title_en',
        'title_ne',
        'image',
        'description_en',
        'description_ne',
        'glass_text_en',
        'glass_text_ne',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
