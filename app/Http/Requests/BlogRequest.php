<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $blogId = $this->route('blog');
        return [

            'title_en' => 'required|string|max:255',
            'title_np' => 'nullable|string|max:255',

            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blogId,

            'image' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'description_en' => 'nullable|string',
            'description_np' => 'nullable|string',

            'is_active' => 'nullable|boolean',
        ];
    }
}
