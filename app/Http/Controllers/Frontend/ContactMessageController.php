<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Models\ContactMessage;
 

class ContactMessageController extends Controller
{
    public function store(ContactMessageRequest $request)
    {
        ContactMessage::create($request->validated());

        return back()->with(
            'success',
            app()->getLocale() == 'ne'
                ? 'तपाईंको सन्देश सफलतापूर्वक प्राप्त भयो। हाम्रो टोलीले आवश्यक परेमा तपाईंलाई सम्पर्क गर्नेछ।'
                : 'Your message has been received successfully. Our team will contact you if any follow-up is required.'
        );
    }
}
