<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'name_en',
        'name_ne',
        'designation_en',
        'designation_ne',
        'description_en',
        'description_ne',
        'is_active',
    ];
}
