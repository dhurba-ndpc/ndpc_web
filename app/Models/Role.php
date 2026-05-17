<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Role extends SpatieRole
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     * Required for older Laravel versions; optional for Laravel 10/11.
     */
    protected $dates = ['deleted_at'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            config('auth.providers.users.model'),
            'model_has_roles',
            'role_id',
            'model_id'
        );
    }
}
