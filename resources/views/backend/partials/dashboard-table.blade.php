@php
    $isContact = $type === 'contact_message';
@endphp

<div class="card shadow">
    @once
        <style>
            .dashboard-email-modal .modal-content {
                border: 0;
                border-radius: .5rem;
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, .18);
            }

            .dashboard-email-dialog {
                margin-top: 1.75rem;
                margin-bottom: 1.75rem;
            }

            .dashboard-email-modal .modal-body {
                background: #f8f9fc;
            }

            .dashboard-email-modal .form-control {
                background: #fff;
            }

            .dashboard-email-modal .email-recipient-box {
                background: #fff;
                border: 1px solid #e2e8f4;
                border-radius: .5rem;
                padding: .85rem;
            }
        </style>
    @endonce

    <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        <span class="badge badge-pill badge-primary">{{ $items->count() }} latest</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>{{ $isContact ? 'Phone' : 'Type / Position' }}</th>
                        <th>Received</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        @php
                            $name = $isContact ? $item->name : $item->full_name;
                            $email = $item->email;
                        @endphp
                        <tr class="{{ $item->read_at ? '' : 'table-warning' }}">
                            <td>
                                @if ($item->read_at)
                                    <span class="badge badge-secondary">Old</span>
                                @else
                                    <span class="badge badge-warning">New</span>
                                @endif
                            </td>
                            <td>{{ $name }}</td>
                            <td>{{ $email }}</td>
                            <td>
                                @if ($isContact)
                                    {{ $item->phone }}
                                @else
                                    {{ str_replace('_', ' ', $item->application_type) }}
                                    <br>
                                    <small class="text-muted">
                                        {{ $item->vacancy?->title_en ?? $item->interested_position ?? 'No position set' }}
                                    </small>
                                @endif
                            </td>
                            <td>{{ $item->created_at?->format('M d, Y h:i A') }}</td>
                            <td class="text-right">
                                <a href="{{ route($showRoute, $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#emailModal_{{ $type }}_{{ $item->id }}">
                                    <i class="fas fa-envelope"></i>
                                </button>
                                <form action="{{ route($deleteRoute, $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($items as $item)
    @php
        $name = $isContact ? $item->name : $item->full_name;
        $email = $item->email;
    @endphp

    <div class="modal fade" id="emailModal_{{ $type }}_{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog dashboard-email-dialog dashboard-email-modal">
            <form class="modal-content" action="{{ route('dashboard.send-email') }}" method="POST">
                @csrf
                <input type="hidden" name="source_type" value="{{ $type }}">
                <input type="hidden" name="source_id" value="{{ $item->id }}">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title font-weight-bold">Send Email to {{ $name }}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Recipient</label>
                        <div class="email-recipient-box">
                            <div class="font-weight-bold text-dark">{{ $name }}</div>
                            <div class="small text-muted">{{ $email }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-dark" for="subject_{{ $type }}_{{ $item->id }}">
                            Subject
                        </label>
                        <input type="text" class="form-control" id="subject_{{ $type }}_{{ $item->id }}"
                            name="subject">
                    </div>
                    <div class="form-group mb-0">
                        <label class="font-weight-bold text-dark" for="message_{{ $type }}_{{ $item->id }}">
                            Message
                        </label>
                        <textarea class="form-control" id="message_{{ $type }}_{{ $item->id }}" name="message" rows="5"
                            placeholder="Write your message..."></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Send Email</button>
                </div>
            </form>
        </div>
    </div>
@endforeach
