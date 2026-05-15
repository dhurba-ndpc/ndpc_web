<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureAreas extends Model
{
    protected $fillable = [
        'type',
        'title_en',
        'title_ne',
        'subtitle_en',
        'subtitle_ne',
        'description_en',
        'description_ne',
        'image',
        'position',
        'is_active',
        
    ];

}

 
