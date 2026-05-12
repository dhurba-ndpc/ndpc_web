<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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

            'album_id' => 'required|exists:albums,id',

            'title_en' => 'nullable|string|max:255',

            'title_ne' => 'nullable|string|max:255',

            'description_en' => 'nullable|string',

            'description_ne' => 'nullable|string',

            'image' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'is_active' => 'nullable|boolean',
        ];
    }
}
