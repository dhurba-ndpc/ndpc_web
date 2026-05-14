<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TechnologySolutionItemRequest extends FormRequest
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

            'technology_solution_category_id' => 'required|exists:technology_solution_categories,id',

            'title_en' => 'required|string|max:255',
            'title_ne' => 'nullable|string|max:255',

            'short_description_en' => 'required|string',
            'short_description_ne' => 'nullable|string',

            'use_case_title_en' => 'required|string|max:255',
            'use_case_title_ne' => 'nullable|string|max:255',

            'use_case_description_en' => 'required|string',
            'use_case_description_ne' => 'nullable|string',

            'stat_one_value' => 'required|integer|max:50',
            'stat_one_label_en' => 'required|string|max:100',
            'stat_one_label_ne' => 'nullable|string|max:100',

            'stat_two_value' => 'required|integer|max:50',
            'stat_two_label_en' => 'required|string|max:100',
            'stat_two_label_ne' => 'nullable|string|max:100',

            'stat_three_value' => 'required|integer|max:50',
            'stat_three_label_en' => 'required|string|max:100',
            'stat_three_label_ne' => 'nullable|string|max:100',

            'stat_four_value' => 'required|integer|max:50',
            'stat_four_label_en' => 'required|string|max:100',
            'stat_four_label_ne' => 'nullable|string|max:100',

            'image' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'glass_text_en' => 'required|string|max:255',
            'glass_text_ne' => 'nullable|string|max:255',

        
            'is_active' => 'nullable|boolean',

        ];
    }
}
