<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends SpatieRole
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     * Required for older Laravel versions; optional for Laravel 10/11.
     */
    protected $dates = ['deleted_at'];

  
}