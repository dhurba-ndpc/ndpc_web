<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class JobApplicationRequest extends FormRequest
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
            'modal_id' => ['required', 'regex:/^([0-9]+|generalApplicationModal)$/'],
            'validation_bag' => ['required', 'regex:/^(vacancy_[0-9]+|general_application)$/'],
            'vacancy_id' => [
                'required_if:application_type,open_application',
                'prohibited_unless:application_type,open_application',
                'integer',
                'exists:vacancies,id',
            ],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'unique:job_applications,email'
            ],
            'phone_number' => ['required', 'string', 'max:20'],
            'file' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'why_hire_you' => ['nullable', 'string', 'max:2000'],
            'is_agreed' => ['required', 'accepted'],
            'application_type' => ['required', 'in:free_vacancy_application,open_application'],
            'interested_position' => [
                'required_if:application_type,free_vacancy_application',
                'prohibited_unless:application_type,free_vacancy_application',
                'string',
                'max:255',
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $fields = [
            'modal_id',
            'validation_bag',
            'vacancy_id',
            'full_name',
            'email',
            'phone_number',
            'why_hire_you',
            'application_type',
            'interested_position',
        ];

        $clean = [];

        foreach ($fields as $field) {
            if ($this->has($field)) {
                $clean[$field] = trim(strip_tags((string) $this->input($field)));
            }
        }

        $this->merge($clean);
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $allowedKeys = [
                '_token',
                'modal_id',
                'validation_bag',
                'vacancy_id',
                'full_name',
                'email',
                'phone_number',
                'file',
                'why_hire_you',
                'is_agreed',
                'application_type',
                'interested_position',
            ];

            $unexpectedKeys = array_diff(array_keys($this->all()), $allowedKeys);

            if (!empty($unexpectedKeys)) {
                $validator->errors()->add(
                    'request',
                    'Invalid form submission. Please refresh the page and try again.'
                );
            }
        });
    }

    protected function failedValidation(Validator $validator)
    {
        $errorBag = $this->safeErrorBag();

        throw new HttpResponseException(
            redirect()
                ->back()
                ->withErrors($validator, $errorBag)
                ->withInput()
                ->with('modal_id', $this->safeModalId())
                ->with('error_bag', $errorBag)
        );
    }

    private function safeErrorBag(): string
    {
        $errorBag = (string) $this->input('validation_bag', 'default');

        return preg_match('/^(vacancy_[0-9]+|general_application)$/', $errorBag)
            ? $errorBag
            : 'default';
    }

    private function safeModalId(): ?string
    {
        $modalId = (string) $this->input('modal_id', '');

        return preg_match('/^([0-9]+|generalApplicationModal)$/', $modalId)
            ? $modalId
            : null;
    }
}
