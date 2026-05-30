<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;

class JobApplicationController extends Controller
{
    public function store(JobApplicationRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $data = array_intersect_key($validated, array_flip([
            'vacancy_id',
            'full_name',
            'email',
            'phone_number',
            'why_hire_you',
            'is_agreed',
            'application_type',
            'interested_position',
        ]));

        $data['file'] = $request->file('file')->store('job-applications', 'public');
        $data['is_agreed'] = $request->boolean('is_agreed');

        JobApplication::create($data);

        return redirect()
            ->back()
            ->with('success_modal_id', $request->input('modal_id'))
            ->with('success_title', 'Application submitted successfully')
            ->with('success_message', 'Thank you for submitting your application. Your details have been sent to our administration team for review. If your profile matches the position requirements, our team will contact you using the information you provided.');
    }
}
