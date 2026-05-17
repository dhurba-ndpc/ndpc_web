<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionMessage extends Model
{
    protected $fillable = [
        'badge_title_en',
        'badge_title_ne',
        'title_en',
        'title_ne',
        'short_description_en',
        'short_description_ne',
        'google_play_store_link',
        'app_store_link',
        'type',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
