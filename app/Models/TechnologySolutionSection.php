<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologySolutionSection extends Model
{
    protected $fillable = [
        'title_en',
        'title_ne',
        'is_active',
    ];
}
