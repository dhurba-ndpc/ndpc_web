<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OurProductRequest extends FormRequest
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

           
            'badge_title_en' => 'required|string|max:255',
            'badge_title_ne' => 'nullable|string|max:255',

           
            'title_en' => 'required|string|max:255',
            'title_ne' => 'nullable|string|max:255',

           
            'image' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            
            'description_en' => 'required|string',
            'description_ne' => 'nullable|string',

           
            'glass_text_en' => 'required|string|max:255',
            'glass_text_ne' => 'nullable|string|max:255',

            
            'is_active' => 'nullable|boolean',

        ];
    }
}
