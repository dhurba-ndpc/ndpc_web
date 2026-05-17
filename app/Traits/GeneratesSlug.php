<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GeneratesSlug
{
    protected function generateUniqueSlug(string $model, string $title, ?int $ignoreId = null, string $column = 'slug'): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $count = 1;

        $query = $model::withTrashed();

        while (
            $query
                ->where($column, $slug)
                ->when(
                    $ignoreId,
                    fn($q) => $q->where('id', '!=', $ignoreId)
                )
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
