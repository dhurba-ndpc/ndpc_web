<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Vacancy extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title_en',
        'title_ne',
        'slug',
        'location',
        'employment_type',
        'short_description_en',
        'short_description_ne',
        'description_en',
        'description_ne',
        'salary',
        'experience_level',
        'total_applicants',
        'deadline',
        'is_active',
    ];


    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean',
    ];


    protected static function booted()
    {
        static::creating(function ($vacancy) {
            $baseSlug = Str::slug($vacancy->title_en);
            $slug = $baseSlug;
            $count = 1;
            while (self::withTrashed()->where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $count;
                $count++;
            }
            $vacancy->slug = $slug;
        });
    }
}
