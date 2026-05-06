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
        'page_template',
        'position',
        'is_main_child',
        'parent_id',
        'menu_location',
        'image',
        'page_title',
        'slug',
        'content',
        'description',
        'external_link',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'is_active',

    ];

    protected static function booted()
    {
        static::saving(function ($menu) {
            if (!$menu->slug) {
                $base = Str::slug($menu->menu_name);
                $menu->slug = $base . '-' . rand(1000, 9999);

                $i = 1;
                while (self::where('slug', $menu->slug)->exists()) {
                    $menu->slug = $base . '-' . $i++;
                }
            }
        });
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('position', 'asc');
    }
}
