<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\JobApplication;
use App\Models\OutboundMessageLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $contactMessages = ContactMessage::latest()->take(8)->get();
        $openApplications = JobApplication::with('vacancy')
            ->where('application_type', 'open_application')
            ->latest()
            ->take(8)
            ->get();
        $freeApplications = JobApplication::where('application_type', 'free_vacancy_application')
            ->latest()
            ->take(8)
            ->get();
        $emailLogs = OutboundMessageLog::with('sender')->latest('sent_at')->take(8)->get();

        $stats = [
            'contact_total' => ContactMessage::count(),
            'contact_new' => ContactMessage::whereNull('read_at')->count(),
            'contact_old' => ContactMessage::whereNotNull('read_at')->count(),
            'open_total' => JobApplication::where('application_type', 'open_application')->count(),
            'open_new' => JobApplication::where('application_type', 'open_application')->whereNull('read_at')->count(),
            'open_old' => JobApplication::where('application_type', 'open_application')->whereNotNull('read_at')->count(),
            'free_total' => JobApplication::where('application_type', 'free_vacancy_application')->count(),
            'free_new' => JobApplication::where('application_type', 'free_vacancy_application')->whereNull('read_at')->count(),
            'free_old' => JobApplication::where('application_type', 'free_vacancy_application')->whereNotNull('read_at')->count(),
            'emails_sent' => OutboundMessageLog::count(),
        ];

        return view('backend.dashboard', compact(
            'contactMessages',
            'openApplications',
            'freeApplications',
            'emailLogs',
            'stats'
        ));
    }

    public function showContactMessage(ContactMessage $contactMessage): View
    {
        $contactMessage->update(['read_at' => $contactMessage->read_at ?? now()]);
        $emailLogs = OutboundMessageLog::with('sender')
            ->where('source_type', 'contact_message')
            ->where('source_id', $contactMessage->id)
            ->latest('sent_at')
            ->get();

        return view('backend.dashboard-message-show', [
            'record' => $contactMessage,
            'recordType' => 'contact_message',
            'messageType' => 'Contact Message',
            'recipientName' => $contactMessage->name,
            'recipientEmail' => $contactMessage->email,
            'recipientPhone' => $contactMessage->phone,
            'body' => $contactMessage->message,
            'emailLogs' => $emailLogs,
        ]);
    }

    public function showJobApplication(JobApplication $jobApplication): View
    {
        $jobApplication->load('vacancy');
        $jobApplication->update(['read_at' => $jobApplication->read_at ?? now()]);

        $sourceType = $jobApplication->application_type === 'free_vacancy_application'
            ? 'free_apply'
            : 'open_vacancy';

        $emailLogs = OutboundMessageLog::with('sender')
            ->where('source_type', $sourceType)
            ->where('source_id', $jobApplication->id)
            ->latest('sent_at')
            ->get();

        return view('backend.dashboard-message-show', [
            'record' => $jobApplication,
            'recordType' => 'job_application',
            'messageType' => $jobApplication->application_type === 'free_vacancy_application'
                ? 'Free Vacancy Application'
                : 'Open Vacancy Application',
            'recipientName' => $jobApplication->full_name,
            'recipientEmail' => $jobApplication->email,
            'recipientPhone' => $jobApplication->phone_number,
            'body' => $jobApplication->why_hire_you,
            'emailLogs' => $emailLogs,
        ]);
    }

    public function destroyContactMessage(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return redirect()->route('dashboard.index')->with('success', 'Contact message deleted successfully.');
    }

    public function destroyJobApplication(JobApplication $jobApplication): RedirectResponse
    {
        $jobApplication->delete();

        return redirect()->route('dashboard.index')->with('success', 'Job application deleted successfully.');
    }

    public function sendEmail(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'source_type' => ['required', 'in:contact_message,open_vacancy,free_apply'],
            'source_id' => ['required', 'integer'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        [$recipientName, $recipientEmail, $messageType] = $this->resolveRecipient(
            $validated['source_type'],
            (int) $validated['source_id']
        );

        Mail::raw($validated['message'], function ($message) use ($recipientEmail, $recipientName, $validated) {
            $message->to($recipientEmail, $recipientName)->subject($validated['subject']);
        });

        OutboundMessageLog::create([
            'message_type' => $messageType,
            'source_type' => $validated['source_type'],
            'source_id' => $validated['source_id'],
            'recipient_name' => $recipientName,
            'recipient_email' => $recipientEmail,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'sent_by' => auth()->id(),
            'sent_at' => now(),
        ]);

        return back()->with('success', 'Email sent and recorded successfully.');
    }

    private function resolveRecipient(string $sourceType, int $sourceId): array
    {
        if ($sourceType === 'contact_message') {
            $record = ContactMessage::findOrFail($sourceId);

            return [$record->name, $record->email, 'contact_message'];
        }

        $record = JobApplication::findOrFail($sourceId);
        $messageType = $sourceType === 'free_apply'
            ? 'free_apply_message'
            : 'open_vacancy_message';

        return [$record->full_name, $record->email, $messageType];
    }
}
