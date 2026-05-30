<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => strip_tags(trim($this->name)),
            'email' => strtolower(strip_tags(trim($this->email))),
            'phone' => strip_tags(trim($this->phone)),
            'message' => strip_tags(trim($this->message)),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:150',
                'regex:/^[a-zA-Z\s.\'-]+$/',
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:150',
            ],
            'phone' => [
                'required',
                'string',
                'min:7',
                'max:20',
                'regex:/^[0-9+\-\s()]+$/',
            ],
            'message' => [
                'required',
                'string',
                'min:10',
                'max:2000',
                'not_regex:/<[^>]*>/',
            ],
        ];
    }
}
