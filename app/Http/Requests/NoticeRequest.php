<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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

            'title_en' => 'required|string|max:255',
            'title_ne' => 'nullable|string|max:255',

            'badge_title_en' => 'nullable|string|max:255',
            'badge_title_ne' => 'nullable|string|max:255',

            'file' => $this->isMethod('post')
                ? 'required|file|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:20480'
                : 'nullable|file|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:20480',

            'type' => 'required|in:report,notices',

            'is_active' => 'nullable|boolean',

        ];
    }
}
