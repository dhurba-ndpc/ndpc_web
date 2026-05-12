<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DarkBanner extends Model
{

    protected $fillable = [
        'title_en',
        'title_ne',
        'subtitle_en',
        'subtitle_ne',
        'description_en',
        'description_ne',
        'image',
        'is_active',
    ];
}
