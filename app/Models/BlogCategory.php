<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title_en',
        'title_ne',
        'slug',
        'is_active',
    ];

    public function blogs()
    {
        return $this->belongsToMany(
            Blog::class,
            'blog_category_blog'
        );
    }

    protected static function booted()
{
    static::saving(function ($category) {

        if (!empty($category->title_en)) {

            $slug = Str::slug($category->title_en);

            $originalSlug = $slug;

            $count = 1;

            while (
                static::where('slug', $slug)
                    ->where('id', '!=', $category->id)
                    ->exists()
            ) {
                $slug = $originalSlug . '-' . $count++;
            }

            $category->slug = $slug;
        }
    });
}


}
