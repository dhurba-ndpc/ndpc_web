<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class DarkBannerRequest extends FormRequest
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
            'type' => ['required', Rule::in([
                'dark_banner',
                'mvg',
            ])],
            'title_en' => 'required|string|max:255',
            'title_ne' => 'nullable|string|max:255',

            'subtitle_en' => 'required|string|max:255',
            'subtitle_ne' => 'nullable|string|max:255',

            'description_en' => 'required|string',
            'description_ne' => 'nullable|string',

            'position' => 'nullable|integer|min:0',

            'image' => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            'is_active' => 'nullable|boolean',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $exception = new ValidationException($validator);

        $exception->errorBag = 'darkBanner';

        throw $exception;
    }
}
