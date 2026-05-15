<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RecruitmentResultRequest extends FormRequest
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


            'selected_candidates' => 'nullable|array',
            'selected_candidates.*.sn' => 'nullable|integer|min:1',
            'selected_candidates.*.name_en' => 'required_with:selected_candidates|string|max:255',
            'selected_candidates.*.name_ne' => 'nullable|string|max:255',

            'waiting_candidates' => 'nullable|array',
            'waiting_candidates.*.sn' => 'nullable|integer|min:1',
            'waiting_candidates.*.name_en' => 'required_with:waiting_candidates|string|max:255',
            'waiting_candidates.*.name_ne' => 'nullable|string|max:255',

            'is_active' => 'nullable|boolean',
        ];
    }
}
