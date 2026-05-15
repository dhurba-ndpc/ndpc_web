<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title_en',
        'title_ne',

        'badge_title_en',
        'badge_title_ne',

        'file',

        'type',

        'is_active',
    ];
}
