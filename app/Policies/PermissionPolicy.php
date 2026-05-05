<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Str;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, $model): bool
    {
        return $user->can($this->getModelName($model) . '-View');
    }

    public function view(User $user, $model): bool
    {
        return $user->can($this->getModelName($model) . '-View');
    }

    public function create(User $user, $model): bool
    {
        return $user->can($this->getModelName($model) . '-Create');
    }

    public function update(User $user, $model): bool
    {
        return $user->can($this->getModelName($model) . '-Edit');
    }

    public function delete(User $user, $model): bool
    {
        return $user->can($this->getModelName($model) . '-Delete');
    }

    /**
     * Converts "App\Models\Banner" to "Banner"
     */
    protected function getModelName($model): string
    {
        $class = is_string($model) ? $model : get_class($model);
        // class_basename returns "Banner", "About", etc.
        return Str::studly(class_basename($class));
    }
}
