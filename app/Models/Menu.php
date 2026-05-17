<?php

namespace App\Models;

use App\Traits\GeneratesSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes, GeneratesSlug;

    protected $fillable = [
        'menu_name_en',
        'menu_name_ne',
        'page_template',
        'position',
        'is_main_child',
        'parent_id',
        'menu_location',
        'image',
        'page_title_en',
        'page_title_ne',
        'slug',
        'content_en',
        'content_ne',
        'description_en',
        'description_ne',
        'external_link',
        'meta_title_en',
        'meta_keywords_en',
        'meta_description_en',
        'canonical_url',
        'og_title_en',
        'og_description_en',
        'og_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function ($menu) {
            if (
                empty($menu->slug) ||
                $menu->isDirty('menu_name_en')
            ) {
                $menu->slug = $menu->generateUniqueSlug(
                    self::class,
                    $menu->menu_name_en,
                    $menu->id
                );
            }
        });
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('position', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
