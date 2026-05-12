<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Album extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title_en',
        'title_ne',
        'slug',
        'description_en',
        'description_ne',
        'image',
        'is_active',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    protected static function booted()
    {
        static::creating(function ($album) {
            $baseSlug = Str::slug($album->title_en);
            $slug = $baseSlug;
            $count = 1;
            while (self::withTrashed()->where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $count;
                $count++;
            }
            $album->slug = $slug;
        });
    }
}
