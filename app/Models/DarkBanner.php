<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DarkBanner extends Model
{

    protected $fillable = [
        'title_en',
        'title_np',
        'subtitle_en',
        'subtitle_np',
        'description_en',
        'description_np',
        'image',
        'is_active',
    ];
}
