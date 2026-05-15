<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
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
            // Address
            'address_en' => 'nullable|string|max:255',
            'address_ne' => 'nullable|string|max:255',
            // Phone
            'phone_1' => 'nullable|string|max:30',
            'phone_2' => 'nullable|string|max:30',
            // Mobile
            'mobile_no_1' => 'nullable|string|max:30',
            'mobile_no_2' => 'nullable|string|max:30',
            // Zipcode
            'zipcode' => 'nullable|string|max:20',
            // Connect Message
            'connect_short_message_en' => 'nullable|string',
            'connect_short_message_ne' => 'nullable|string',
            // Google Map
            'google_map' => 'nullable|string',
            // Social Links
            'facebook_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'youtube_link' => 'nullable|url|max:255',
            // Email
            'email' => 'nullable|email|max:255',
            // Information Officer
            'information_officer_name_en' => 'nullable|string|max:255',
            'information_officer_name_ne' => 'nullable|string|max:255',
            'information_officer_contact_no' => 'nullable|string|max:30',
            'information_officer_email' => 'nullable|email|max:255',
            // Footer Description
            'footer_short_description_en' => 'nullable|string',
            'footer_short_description_ne' => 'nullable|string',
            // Logos
            'logo_1' => $this->isMethod('post')
                ? 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'logo_2' => $this->isMethod('post')
                ? 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // Status
            'is_active' => 'nullable|boolean',
        ];
    }
}
