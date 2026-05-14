<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'image' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'name_en' => 'required|string|max:255',
            'name_ne' => 'nullable|string|max:255',

            'designation_en' => 'required|string|max:255',
            'designation_ne' => 'nullable|string|max:255',

            'description_en' => 'required|string',
            'description_ne' => 'nullable|string',

            'is_active' => 'nullable|boolean',
        ];
    }
}
