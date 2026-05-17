<?php

namespace App\Models;

use App\Traits\GeneratesSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 

class BlogCategory extends Model
{
    use SoftDeletes, GeneratesSlug;

    protected $fillable = [
        'title_en',
        'title_ne',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function blogs()
    {
        return $this->belongsToMany(
            Blog::class,
            'blog_category_blog'
        );
    }

     protected static function booted(): void
    {
        static::saving(function ($category) {

            if (
                empty($category->slug) ||
                $category->isDirty('title_en')
            ) {

                $category->slug = $category->generateUniqueSlug(
                    self::class,
                    $category->title_en,
                    $category->id
                );
            }
        });
    }
}
