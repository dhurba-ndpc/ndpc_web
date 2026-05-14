<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TechnologySolutionCategoryRequest extends FormRequest
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

            'title_en' => 'required|string|max:255',
            'title_ne' => 'nullable|string|max:255',

            'position' => 'nullable|integer|min:0|max:9999',

            'is_active' => 'nullable|boolean',

        ];
    }
}
