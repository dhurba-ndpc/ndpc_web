@extends('backend.layout.main')

@section('content')
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
            <div class="card shadow">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Send Email</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.send-email') }}" method="POST">
                        @csrf
                        <input type="hidden" name="source_type"
                            value="{{ $recordType === 'contact_message' ? 'contact_message' : ($record->application_type === 'free_vacancy_application' ? 'free_apply' : 'open_vacancy') }}">
                        <input type="hidden" name="source_id" value="{{ $record->id }}">
                        <div class="form-group">
                            <label>To</label>
                            <input type="email" class="form-control" value="{{ $recipientEmail }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                                name="subject" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="6">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Send Email</button>
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
