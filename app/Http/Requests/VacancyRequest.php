<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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

            'slug' => 'nullable|string|max:255',

            'location' => 'required|string|max:255',

            'employment_type' => 'required|in:full_time,part_time,remote,hybrid,contract,internship',

            'short_description_en' => 'nullable|string',
            'short_description_ne' => 'nullable|string',

            'description_en' => 'required|string',
            'description_ne' => 'nullable|string',

            'salary' => 'nullable|string|max:255',

            'experience_level' => 'nullable|string|max:255',

            'total_applicants' => 'nullable|integer|min:0',

            'deadline' => 'required|date|after_or_equal:today',
            'external_link' => 'nullable|url',

            'is_active' => 'nullable|boolean',
        ];
    }
}
