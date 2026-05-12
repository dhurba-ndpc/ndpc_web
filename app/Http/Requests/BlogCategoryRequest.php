<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $blogCategoryId = $this->route('blogCategory');

        return [
            'title_en' => 'required|string|max:255',
            'title_ne' => 'nullable|string|max:255',

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('blog_categories', 'slug')
                    ->ignore($blogCategoryId),
            ],

            'is_active' => 'nullable|boolean',
        ];
    }
}