<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'album_id',
        'title_en',
        'title_ne',
        'description_en',
        'description_ne',
        'image',
        'is_active',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
