<?php

namespace App\Models;

use App\Traits\GeneratesSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 

class Album extends Model
{
    use SoftDeletes, GeneratesSlug;

    protected $fillable = [
        'title_en',
        'title_ne',
        'slug',
        'description_en',
        'description_ne',
        'image',
        'is_active',
    ];
    protected $casts = [
    'is_active' => 'boolean',
];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    
    protected static function booted(): void
    {
        static::saving(function ($album) {

            if (
                empty($album->slug) ||
                $album->isDirty('title_en')
            ) {

                $album->slug = $album->generateUniqueSlug(
                    self::class,
                    $album->title_en,
                    $album->id
                );
            }
        });
    }
}
