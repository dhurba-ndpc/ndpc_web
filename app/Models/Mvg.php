<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mvg extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title_en',
        'title_np',
        'subtitle_en',
        'subtitle_np',
        'description_en',
        'description_np',
        'image',
        'position',
        'is_active',
    ];
}
