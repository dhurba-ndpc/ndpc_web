<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',

        'title_en',
        'title_np',
        'slug',
        'image',
        'description_en',
        'description_np',
        'is_active',
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

    protected static function booted()
    {
        static::saving(function ($blog) {

            if (!empty($blog->title_en)) {

                $slug = Str::slug($blog->title_en);

                $originalSlug = $slug;

                $count = 1;

                while (
                    static::where('slug', $slug)
                    ->where('id', '!=', $blog->id)
                    ->exists()
                ) {
                    $slug = $originalSlug . '-' . $count++;
                }

                $blog->slug = $slug;
            }
        });
    }
}
