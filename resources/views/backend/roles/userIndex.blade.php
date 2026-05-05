@extends('backend.layout.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">User Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Create New User
            </a>
            <a class="btn btn-sm btn-outline-danger shadow-sm" href="{{ route('users.trash') }}">
                <i class="fas fa-trash-alt fa-sm mr-1"></i> View Trash Bin
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Access Registry</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-light">
                                <tr>
                                    <th>User / Identity</th>
                                    <th>Role</th>
                                    <th>Permissions Scope</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>

                                            <div class="font-weight-bold text-dark">

                                                {{ $user->name }}
                                                @if (Auth::id() == $user->id)
                                                    <span class="badge badge-primary ml-2">You Current logged In</span>
                                                @endif
                                            </div>
                                            <div class="small text-muted">{{ $user->email }}</div>
                                        </td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-primary badge-pill px-3">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($user->roles->flatMap->permissions->unique('id') as $permission)
                                                @php
                                                    $parts = explode('-', $permission->name);
                                                    $action = isset($parts[1]) ? strtolower($parts[1]) : 'view';

                                                    $badgeColor = match ($action) {
                                                        'read', 'view' => 'badge-primary',
                                                        'create', 'write' => 'badge-success',
                                                        'edit', 'update' => 'badge-info',
                                                        'delete', 'destroy' => 'badge-danger',
                                                        default => 'badge-secondary',
                                                    };
                                                @endphp
                                                <span class="badge {{ $badgeColor }} mb-1" style="font-size: 0.75rem;">
                                                    {{ $permission->name }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-info btn-sm shadow-sm" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm shadow-sm ml-1" data-toggle="modal"
                                                    data-target="#deleteModal_{{ $user->id }}" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <div class="modal fade" id="deleteModal_{{ $user->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content border-0 shadow-lg">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title font-weight-bold">
                                                                    <i class="fas fa-exclamation-triangle mr-2"></i>Confirm
                                                                    Delete
                                                                </h5>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left p-4">
                                                                Are you sure you want to delete the User
                                                                <strong>"{{ $user->name }}"</strong>?
                                                                <p class="text-muted small mt-2">It will move to trash</p>
                                                            </div>
                                                            <div class="modal-footer bg-light">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <form method="POST"
                                                                    action="{{ route('users.destroy', $user->id) }}">
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

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
