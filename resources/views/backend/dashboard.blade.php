@extends('backend.layout.main')

@section('content')
    @php
        $totalNew = $stats['contact_new'] + $stats['open_new'] + $stats['free_new'];
    @endphp

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Messages & Applications</li>
                </ol>
            </nav>
        </div>
    </div>

    @if ($totalNew > 0)
        <div class="alert alert-warning border-left-warning shadow-sm">
            <strong>{{ $totalNew }} new item{{ $totalNew === 1 ? '' : 's' }} need attention.</strong>
            Review new contact messages and job applications below.
        </div>
    @endif

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Contact Messages</div>
                    <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $stats['contact_total'] }}</div>
                    <div class="small text-muted">New: {{ $stats['contact_new'] }} | Old: {{ $stats['contact_old'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Open Vacancy Applications</div>
                    <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $stats['open_total'] }}</div>
                    <div class="small text-muted">New: {{ $stats['open_new'] }} | Old: {{ $stats['open_old'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Free Applications</div>
                    <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $stats['free_total'] }}</div>
                    <div class="small text-muted">New: {{ $stats['free_new'] }} | Old: {{ $stats['free_old'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Emails Sent</div>
                    <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $stats['emails_sent'] }}</div>
                    <div class="small text-muted">Recorded admin replies</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            @include('backend.partials.dashboard-table', [
                'title' => 'Contact Messages',
                'type' => 'contact_message',
                'items' => $contactMessages,
                'showRoute' => 'dashboard.contact-messages.show',
                'deleteRoute' => 'dashboard.contact-messages.destroy',
            ])
        </div>

        <div class="col-lg-12 mb-4">
            @include('backend.partials.dashboard-table', [
                'title' => 'Open Vacancy Applications',
                'type' => 'open_vacancy',
                'items' => $openApplications,
                'showRoute' => 'dashboard.job-applications.show',
                'deleteRoute' => 'dashboard.job-applications.destroy',
            ])
        </div>

        <div class="col-lg-12 mb-4">
            @include('backend.partials.dashboard-table', [
                'title' => 'Free Vacancy Applications',
                'type' => 'free_apply',
                'items' => $freeApplications,
                'showRoute' => 'dashboard.job-applications.show',
                'deleteRoute' => 'dashboard.job-applications.destroy',
            ])
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Recent Email Records</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Recipient</th>
                            <th>Subject</th>
                            <th>Sent By</th>
                            <th>Sent At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emailLogs as $log)
                            <tr>
                                <td><span class="badge badge-light">{{ str_replace('_', ' ', $log->message_type) }}</span></td>
                                <td>{{ $log->recipient_name }}<br><small class="text-muted">{{ $log->recipient_email }}</small></td>
                                <td>{{ $log->subject }}</td>
                                <td>{{ $log->sender?->name ?? 'System' }}</td>
                                <td>{{ $log->sent_at?->format('M d, Y h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No emails sent yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
