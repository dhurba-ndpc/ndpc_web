<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Menu extends Model
{
     use SoftDeletes;
     
    protected $fillable = [
        'menu_name',
        'category_slug',
        'position',
        'is_main_child',
        'parent_id',
        'menu_location',
        'is_active',
        'banner_image',
        'image',
        'page_title',
        'slug',
        'content',
        'description',
        'external_link',
    ];

    protected static function booted()
    {
        static::saving(function ($menu) {
            if (!$menu->slug) {
                $base = Str::slug($menu->menu_name);
                $menu->slug = $base;

                $i = 1;
                while (self::where('slug', $menu->slug)->exists()) {
                    $menu->slug = $base . '-' . $i++;
                }
            }
        });
    }
}
