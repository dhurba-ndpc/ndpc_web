<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
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
        return [
            'menu_name' => 'required|string|max:255',
            'page_template' => 'required|string|max:255',
            'position' => 'nullable|integer|min:0',
            'is_main_child' => [
                'required',
                Rule::in(['child_menu', 'parent_menu'])
            ],
            'parent_id' => [
                'nullable',
                'exists:menus,id'
            ],
            'menu_location' => [
                'required',
                Rule::in([
                    'header',
                    'footer',
                    'header_footer',
                    'useful_links'
                ])
            ],
            'image' => $this->isMethod('post')
                ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
                : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'page_title' => 'nullable|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('menus', 'slug')->ignore($this->menu)
            ],
            'content' => 'nullable|string',
            'description' => 'nullable|string',
            'external_link' => 'nullable|url|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'canonical_url' => 'nullable|url|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => $this->isMethod('post')
                ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
                : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [

            'menu_name.required' => 'Menu name is required.',
            'parent_id.exists' => 'Selected parent menu does not exist.',
            'slug.unique' => 'Slug already exists.',
            'image.image' => 'Image must be a valid image file.',
            'og_image.image' => 'OG image must be a valid image file.',
            'external_link.url' => 'External link must be a valid URL.',
            'canonical_url.url' => 'Canonical URL must be a valid URL.',
        ];
    }
}
