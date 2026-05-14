<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TeamMemberRequest extends FormRequest
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
        $commonRules = [
            'image' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'name_en' => 'required|string|max:255',
            'name_ne' => 'nullable|string|max:255',

            'type' => 'required|in:leading_team,board_of_directors',

            'sort_order' => 'nullable|integer|min:0|max:999999',
            'is_active' => 'nullable|boolean',
        ];

        if ($this->input('type') === 'leading_team') {
            return array_merge($commonRules, [
                'designation_en' => 'nullable|string|max:255',
                'designation_ne' => 'nullable|string|max:255',
            ]);
        }

        if ($this->input('type') === 'board_of_directors') {
            return array_merge($commonRules, [
                'position_en' => 'nullable|string|max:255',
                'position_ne' => 'nullable|string|max:255',

                'organization_involvement_en' => 'nullable|string|max:255',
                'organization_involvement_ne' => 'nullable|string|max:255',
            ]);
        }

        return $commonRules;
    }
}
