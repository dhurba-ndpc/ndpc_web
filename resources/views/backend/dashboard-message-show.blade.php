@extends('backend.layout.main')

@section('content')
    <style>
        .dashboard-email-compose {
            border: 0;
            border-radius: .75rem;
            overflow: hidden;
        }

        .dashboard-email-compose .card-header {
            background: linear-gradient(135deg, #193980, #2f51a3);
            border-bottom: 0;
            color: #fff;
        }

        .dashboard-email-compose .card-header h6 {
            color: #fff;
            font-size: 1rem;
        }

        .dashboard-email-compose .card-body {
            background: #f8f9fc;
        }

        .dashboard-email-compose label {
            color: #1f2d4d;
            font-size: .78rem;
            font-weight: 700;
            margin-bottom: .45rem;
        }

        .dashboard-email-compose .form-control {
            background: #fff;
            border-color: #d9e2f1;
            border-radius: .45rem;
            color: #1f2d4d;
        }

        .dashboard-email-compose .form-control:focus {
            border-color: #2f51a3;
            box-shadow: 0 0 0 .15rem rgba(47, 81, 163, .12);
        }

        .dashboard-email-compose textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .dashboard-email-compose .email-recipient-box {
            background: #fff;
            border: 1px solid #e2e8f4;
            border-radius: .5rem;
            padding: .85rem;
        }
    </style>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ $messageType }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('dashboard.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Submitted Details</h6>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $recipientName }}</dd>

                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">{{ $recipientEmail }}</dd>

                        <dt class="col-sm-3">Phone</dt>
                        <dd class="col-sm-9">{{ $recipientPhone }}</dd>

                        @if ($recordType === 'job_application')
                            <dt class="col-sm-3">Application Type</dt>
                            <dd class="col-sm-9">{{ str_replace('_', ' ', $record->application_type) }}</dd>

                            <dt class="col-sm-3">Vacancy</dt>
                            <dd class="col-sm-9">{{ $record->vacancy?->title_en ?? 'General / Free Application' }}</dd>

                            <dt class="col-sm-3">Interested Position</dt>
                            <dd class="col-sm-9">{{ $record->interested_position ?? '-' }}</dd>

                            <dt class="col-sm-3">Resume</dt>
                            <dd class="col-sm-9">
                                <a href="{{ asset('storage/' . $record->file) }}" target="_blank">View uploaded file</a>
                            </dd>
                        @endif

                        <dt class="col-sm-3">Received</dt>
                        <dd class="col-sm-9">{{ $record->created_at?->format('M d, Y h:i A') }}</dd>

                        <dt class="col-sm-3">Message</dt>
                        <dd class="col-sm-9">{{ $body ?: '-' }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow dashboard-email-compose">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-envelope mr-2"></i>Send Email
                    </h6>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('dashboard.send-email') }}" method="POST">
                        @csrf
                        <input type="hidden" name="source_type"
                            value="{{ $recordType === 'contact_message' ? 'contact_message' : ($record->application_type === 'free_vacancy_application' ? 'free_apply' : 'open_vacancy') }}">
                        <input type="hidden" name="source_id" value="{{ $record->id }}">
                        <div class="form-group">
                            <label class="text-uppercase">Recipient</label>
                            <div class="email-recipient-box">
                                <div class="font-weight-bold text-dark">{{ $recipientName }}</div>
                                <div class="small text-muted">{{ $recipientEmail }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="text-uppercase">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                                name="subject" value="{{ old('subject') }}" placeholder="Enter email subject">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message" class="text-uppercase">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="6"
                                placeholder="Write your reply here...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block shadow-sm">
                            <i class="fas fa-paper-plane mr-1"></i> Send Email
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary">Email History</h6>
        </div>
        <div class="card-body">
            @forelse ($emailLogs as $log)
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $log->subject }}</strong>
                        <small class="text-muted">{{ $log->sent_at?->format('M d, Y h:i A') }}</small>
                    </div>
                    <div class="small text-muted mb-2">
                        Sent by {{ $log->sender?->name ?? 'System' }} | {{ str_replace('_', ' ', $log->message_type) }}
                    </div>
                    <p class="mb-0">{{ $log->message }}</p>
                </div>
            @empty
                <p class="text-muted mb-0">No email records for this item yet.</p>
            @endforelse
        </div>
    </div>
@endsection
