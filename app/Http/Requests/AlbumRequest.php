<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
        // making album in singular 
      
        return [

            'title_en' => 'required|string|max:255',

            'title_ne' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',

            'description_en' => 'nullable|string',

            'description_ne' => 'nullable|string',

            'image' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'is_active' => 'nullable|boolean',
        ];
    }
}
