<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_en' => 'required|string|max:255',
            'title_ne' => 'nullable|string|max:255',

            'slug' => 'nullable|string|max:255',

            'is_active' => 'nullable|boolean',
        ];
    }
}
