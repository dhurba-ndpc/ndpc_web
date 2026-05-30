<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'address_en',
        'address_ne',
        'phone_1',
        'phone_2',
        'mobile_no_1',
        'mobile_no_2',
        'zipcode',
        'connect_short_message_en',
        'connect_short_message_ne',
        'google_map',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'youtube_link',
        'email',
        'image',
        'information_officer_name_en',
        'information_officer_name_ne',
        'information_officer_contact_no',
        'information_officer_email',
        'footer_short_description_en',
        'footer_short_description_ne',
        'logo_1',
        'logo_2',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
