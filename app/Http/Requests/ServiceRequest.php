<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'bootstrap_icon' => 'required|string|max:100',

            'title_en' => 'required|string|max:255',
            'title_ne' => 'nullable|string|max:255',

            'description_en' => 'required|string',
            'description_ne' => 'nullable|string',

            'position' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'type' => 'required|in:services_offer,features_offer',
        ];
    }
}
