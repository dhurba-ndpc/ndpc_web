<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categoryId = $this->route('blog_category');

        return [

            'title_en' => 'required|string|max:255',
            'title_np' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug,' . $categoryId,
            'is_active' => 'nullable|boolean',
        ];
    }
}
