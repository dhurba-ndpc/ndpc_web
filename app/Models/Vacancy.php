<?php

namespace App\Models;

use App\Traits\GeneratesSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use SoftDeletes, GeneratesSlug;

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

    protected static function booted(): void
    {
        static::saving(function ($vacancy) {
            if (
                empty($vacancy->slug) ||
                $vacancy->isDirty('title_en')
            ) {
                $vacancy->slug = $vacancy->generateUniqueSlug(
                    self::class,
                    $vacancy->title_en,
                    $vacancy->id
                );
            }
        });
    }
}
