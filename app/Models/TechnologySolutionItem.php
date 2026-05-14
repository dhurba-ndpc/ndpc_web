<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnologySolutionItem extends Model
{

    use SoftDeletes;
    protected $fillable = [

        'technology_solution_category_id',

        'title_en',
        'title_ne',

        'short_description_en',
        'short_description_ne',

        'use_case_title_en',
        'use_case_title_ne',

        'use_case_description_en',
        'use_case_description_ne',

        'stat_one_value',
        'stat_one_label_en',
        'stat_one_label_ne',

        'stat_two_value',
        'stat_two_label_en',
        'stat_two_label_ne',

        'stat_three_value',
        'stat_three_label_en',
        'stat_three_label_ne',

        'stat_four_value',
        'stat_four_label_en',
        'stat_four_label_ne',

        'image',

        'glass_text_en',
        'glass_text_ne',

        'is_active',
    ];


    public function category()
    {
        return $this->belongsTo(TechnologySolutionCategory::class, 'technology_solution_category_id');
    }
}
