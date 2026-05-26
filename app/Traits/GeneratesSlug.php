<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

trait GeneratesSlug
{
    protected function generateUniqueSlug(string $model, string $title, ?int $ignoreId = null, string $column = 'slug'): string
    {
        $baseSlug = Str::slug($title);
        $matchingSlugs = $this->newSlugQuery($model, $ignoreId)
            ->where(function ($query) use ($column, $baseSlug) {
                $query->where($column, $baseSlug)
                    ->orWhere($column, 'LIKE', $baseSlug . '%');
            })
            ->pluck($column)
            ->filter()
            ->all();

        if (!in_array($baseSlug, $matchingSlugs, true)) {
            return $baseSlug;
        }

        $lastNumber = 0;
        $pattern = '/^' . preg_quote($baseSlug, '/') . '(\d+)$/';

        foreach ($matchingSlugs as $slug) {
            if (preg_match($pattern, $slug, $matches)) {
                $lastNumber = max($lastNumber, (int) $matches[1]);
            }
        }

        return $baseSlug . '-' . ($lastNumber + 1);
    }

    private function newSlugQuery(string $model, ?int $ignoreId = null)
    {
        $usesSoftDeletes = in_array(SoftDeletes::class, class_uses_recursive($model), true);
        $query = $usesSoftDeletes ? $model::withTrashed() : $model::query();

        return $query->when($ignoreId, fn($query) => $query->whereKeyNot($ignoreId));
    }
}
