<?php

namespace App\Models;

use App\Traits\GeneratesSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 

class Blog extends Model
{
    use SoftDeletes, GeneratesSlug;

    protected $fillable = [
        'user_id',

        'title_en',
        'title_ne',
        'slug',
        'image',
        'description_en',
        'description_ne',
        'is_active',
    ];
    protected $casts = [
    'is_active' => 'boolean',
];

    public function categories()
    {
        return $this->belongsToMany(
            BlogCategory::class,
            'blog_category_blog'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        static::saving(function ($blog) {

            if (
                empty($blog->slug) ||
                $blog->isDirty('title_en')
            ) {

                $blog->slug = $blog->generateUniqueSlug(
                    self::class,
                    $blog->title_en,
                    $blog->id
                );
            }
        });
    }
}
