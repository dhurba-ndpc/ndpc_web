@php
    $isContact = $type === 'contact_message';
@endphp

<div class="card shadow">
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

                        <div class="modal fade" id="emailModal_{{ $type }}_{{ $item->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form class="modal-content" action="{{ route('dashboard.send-email') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="source_type" value="{{ $type }}">
                                    <input type="hidden" name="source_id" value="{{ $item->id }}">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Send Email to {{ $name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Recipient</label>
                                            <input type="email" class="form-control" value="{{ $email }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject_{{ $type }}_{{ $item->id }}">Subject</label>
                                            <input type="text" class="form-control"
                                                id="subject_{{ $type }}_{{ $item->id }}" name="subject">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="message_{{ $type }}_{{ $item->id }}">Message</label>
                                            <textarea class="form-control" id="message_{{ $type }}_{{ $item->id }}" name="message" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Send Email</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
