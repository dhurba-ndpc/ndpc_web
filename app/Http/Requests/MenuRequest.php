<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'menu_name_en' => 'required|string|max:255',
            'menu_name_ne' => 'nullable|string|max:255',
            'page_template' => 'required|string|max:255',
            'position' => 'nullable|integer|min:0',
            'is_main_child' => [
                'required',
                Rule::in(['child_menu', 'parent_menu']),
            ],
            'parent_id' => [
                'nullable',
                'exists:menus,id',
            ],
            'menu_location' => [
                'required',
                Rule::in([
                    'header',
                    'footer',
                    'header_footer',
                    'useful_links',
                ]),
            ],
            'image' => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],
            'page_title_en' => 'required|string|max:255',
            'page_title_ne' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content_en' => 'nullable|string',
            'content_ne' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ne' => 'nullable|string',
            'external_link' => 'nullable|url|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_keywords_en' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'canonical_url' => 'nullable|url|max:255',
            'og_title_en' => 'nullable|string|max:255',
            'og_description_en' => 'nullable|string',
            'og_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'menu_name_en.required' => 'Menu name in English is required.',
            'parent_id.exists' => 'Selected parent menu does not exist.',
            'slug.unique' => 'Slug already exists.',
            'is_main_child.required' => 'Menu type is required.',
            'menu_location.required' => 'Menu location is required.',
            'external_link.url' => 'External link must be a valid URL.',
            'canonical_url.url' => 'Canonical URL must be a valid URL.',
            'image.image' => 'Image must be a valid image file.',
            'image.mimes' => 'Image must be jpg, jpeg, png, webp, or svg.',
            'image.max' => 'Image size must not be greater than 2MB.',
            'og_image.image' => 'OG image must be a valid image file.',
            'og_image.mimes' => 'OG image must be jpg, jpeg, png, or webp.',
            'og_image.max' => 'OG image size must not be greater than 2MB.',
        ];
    }
}
