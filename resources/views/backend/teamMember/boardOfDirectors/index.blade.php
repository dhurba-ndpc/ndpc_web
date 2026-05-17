@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Board of Directors</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Board of Directors</li>
                </ol>
            </nav>
        </div>
        @can('BoardOfDirectors-Create')
            <a href="{{ route('boardOfDirectors.create') }}" class="btn btn-primary btn-sm btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-plus fa-sm"></i>
                </span>
                <span class="text">Create Director</span>
            </a>
        @endcan
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-user-tie mr-2"></i>Board Director List
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr class="text-dark">
                            <th width="5%">S.No</th>
                            <th width="12%">Image</th>
                            <th>Director Information</th>
                            <th width="20%">Position</th>
                            <th width="24%">Organization Involvement</th>
                            <th width="10%">Sort Order</th>
                            <th width="12%">Status</th>
                            <th width="12%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $boardDirectorCount = 0;
                        @endphp

                        @foreach ($lists as $list)
                            @if ($list->type === 'board_of_directors')
                                @php
                                    $boardDirectorCount++;
                                @endphp

                                <tr>
                                    <td class="align-middle">{{ $boardDirectorCount }}</td>
                                    <td class="align-middle text-center">
                                        @if ($list->image)
                                            <img src="{{ asset('storage/' . $list->image) }}"
                                                class="img-thumbnail shadow-sm"
                                                style="width: 80px; height: 80px; object-fit: cover;"
                                                alt="{{ $list->name_en }}">
                                        @else
                                            <div class="bg-light border rounded d-flex align-items-center justify-content-center mx-auto text-muted"
                                                style="width: 80px; height: 80px;">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="font-weight-bold text-dark">{{ $list->name_en ?? 'N/A' }}</div>
                                        @if (!empty($list->name_ne))
                                            <div class="small text-muted">{{ $list->name_ne }}</div>
                                        @endif
                                        <span class="badge badge-light border text-primary mt-1">
                                            <i class="fas fa-users mr-1"></i>Board of Directors
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-dark">{{ $list->position_en ?? 'N/A' }}</div>
                                        @if (!empty($list->position_ne))
                                            <div class="small text-muted">{{ $list->position_ne }}</div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-dark">{{ $list->organization_involvement_en ?? 'N/A' }}</div>
                                        @if (!empty($list->organization_involvement_ne))
                                            <div class="small text-muted">{{ $list->organization_involvement_ne }}</div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge badge-light border px-3">
                                            {{ $list->sort_order ?? 0 }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($list->is_active)
                                            <span class="badge badge-pill badge-success shadow-sm px-3">
                                                <i class="fas fa-check-circle mr-1"></i> Published
                                            </span>
                                        @else
                                            <span class="badge badge-pill badge-secondary shadow-sm px-3">
                                                <i class="fas fa-pause-circle mr-1"></i> Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group" role="group">
                                            @can('BoardOfDirectors-Edit')
                                                <a href="{{ route('boardOfDirectors.edit', $list->id) }}"
                                                    class="btn btn-info btn-sm shadow-sm"
                                                    title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            @endcan
                                            @can('BoardOfDirectors-Delete')
                                                <button class="btn btn-danger btn-sm shadow-sm ml-1"
                                                    data-toggle="modal"
                                                    data-target="#deleteModal_{{ $list->id }}"
                                                    title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endcan
                                        </div>

                                        @can('BoardOfDirectors-Delete')
                                        <div class="modal fade"
                                            id="deleteModal_{{ $list->id }}"
                                            tabindex="-1"
                                            role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content border-0 shadow-lg">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title font-weight-bold">
                                                            <i class="fas fa-exclamation-triangle mr-2"></i>Confirm Delete
                                                        </h5>
                                                        <button type="button"
                                                            class="close text-white"
                                                            data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left p-4">
                                                        Are you sure you want to delete board director
                                                        <strong>"{{ $list->name_en }}"</strong>?
                                                        <p class="text-muted small mt-2">This action cannot be undone.</p>
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                        <form method="POST" action="{{ route('boardOfDirectors.destroy', $list->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm shadow-sm px-4">
                                                                Yes, Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endcan
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        @if ($boardDirectorCount === 0)
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-user-tie fa-2x mb-2 d-block"></i>
                                    No board directors found.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
