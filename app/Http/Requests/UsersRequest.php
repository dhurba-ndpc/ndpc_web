<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class UsersRequest extends FormRequest
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

            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[A-Za-z\s]+$/'
            ],

            'email' => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->route('user'))
            ],

            'password' => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'string',
                'max:15',
                'confirmed',

                Password::min(5)
                    ->mixedCase()
                    ->symbols()
            ],

            'role' => ['required'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],

            'phone' => [
                'nullable',
                'regex:/^[0-9+\-\s]+$/',
                'max:20'
            ],

            'address' => [
                'nullable',
                'string',
                'max:500'
            ],

        ];
    }

    /**
     * Custom Error Messages
     */
    public function messages(): array
    {
        return [
            'name.regex' => 'Name must contain only letters and spaces.',
            'password.mixedCase' => 'Password must include at least one uppercase letter.',
            'password.symbols' => 'Password must include at least one special character.',
            'phone.regex' => 'Phone number format is invalid.',

        ];
    }
}
