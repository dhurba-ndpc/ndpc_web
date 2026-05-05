<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes;
    protected $fillable = [

        'badge_text_en',
        'title_en',
        'description_en',

        'badge_text_ne',
        'title_ne',
        'description_ne',
        
        'glass_text',
        'image',
        'is_active',
    ];
}
