<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnologySolutionCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title_en',
        'title_ne',
        'position',
        'is_active',
    ];

    public function items()
    {
        return $this->hasMany(TechnologySolutionItem::class);
    }
}
