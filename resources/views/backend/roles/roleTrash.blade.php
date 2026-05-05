@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Roles Trash Bin</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Trash</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-1"></i> Back to Roles List
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-white">
                <i class="fas fa-trash-restore"></i> Roles Trash Bin
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role Name</th>
                            <th>Deleted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($trashedRoles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->deleted_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <!-- Restore Button -->
                                    <form action="{{ route('roles.restore', $role->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-undo"></i> Restore
                                        </button>
                                    </form>

                                    <!-- Permanent Delete Button -->
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{ $role->id }}"
                                                title="Delete">
                                        <i class="fas fa-fire"></i> Permanent Delete
                                    </button>
                                    <div class="modal fade" id="deleteModal_{{ $role->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content border-0 shadow-lg">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title font-weight-bold">
                                                        <i class="fas fa-exclamation-triangle mr-2"></i>Confirm
                                                        Delete
                                                    </h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left p-4">
                                                    Are you sure you want to delete the Role
                                                    <strong>"{{ $role->name }}"</strong>?
                                                    <p class="text-muted small mt-2">It Will delete Permanently you cant
                                                        undo.
                                                    </p>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form method="POST"
                                                        action="{{ route('roles.forceDelete', $role->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm shadow-sm px-4">Yes,
                                                            Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Trash is empty.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
