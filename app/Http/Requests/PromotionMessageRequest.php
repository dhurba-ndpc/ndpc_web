<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PromotionMessageRequest extends FormRequest
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
            'badge_title_en' => ['required', 'string', 'max:255'],
            'badge_title_ne' => ['nullable', 'string', 'max:255'],

            'title_en' => ['required', 'string', 'max:255'],
            'title_ne' => ['nullable', 'string', 'max:255'],

            'short_description_en' => ['nullable', 'string'],
            'short_description_ne' => ['nullable', 'string'],

            'google_play_store_link' => ['nullable', 'url', 'max:255'],
            'app_store_link' => ['nullable', 'url', 'max:255'],

            'type' => ['required', 'in:app_link,promotion_text'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

  
protected function failedValidation(Validator $validator)
{
    $bags = [
        'playStore.store' => 'playStore',
        'promotion_message.store' => 'promotion_message',
    ];

    $routeName = $this->route()->getName();

    $exception = new ValidationException($validator);

    $exception->errorBag = $bags[$routeName] ?? 'default';

    throw $exception;
}
}
