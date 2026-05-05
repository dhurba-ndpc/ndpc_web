@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Role Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                </ol>
            </nav>
        </div>
        <a class="btn btn-sm btn-outline-danger shadow-sm" href="{{ route('roles.trash') }}">
            <i class="fas fa-trash-alt fa-sm mr-1"></i> View Trash Bin
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3 bg-white border-bottom-primary">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-shield-alt fa-fw mr-2"></i>Role Architecture & Management
                    </h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="small font-weight-bold text-dark">Role Name</label>
                            <input type="text" class="form-control" placeholder="e.g. Senior Auditor" name="name">
                            @error('name', 'roleBag')
                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">Save New Role</span>
                            </button>
                        </div>
                    </form>
                    <br>
                    <div class="form-section-title">
                        <h6 class="m-0 font-weight-bold text-primary">Existing Roles Architecture</h6>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="rolesTable" width="100%" cellspacing="0">
                            <thead class="bg-light">
                                <tr class="text-xs font-weight-bold text-dark text-uppercase">
                                    <th>ID</th>
                                    <th>Role Designation</th>
                                    <th>Permissions</th>
                                    <th>Users Count</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="small text-dark">
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="font-weight-bold">{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                            
                                                @php
                                                    $parts = explode('-', $permission->name);
                                                      
                                                    $action = isset($parts[1])
                                                        ? strtolower(trim($parts[1]))
                                                        : 'default';
                                                       
                                                    $badgeClass = match ($action) {
                                                        'view' => 'badge-primary',
                                                        'create' => 'badge-success',
                                                        'edit' => 'badge-info',
                                                        'delete' => 'badge-danger',
                                                        default => 'badge-secondary',
                                                    };
                                                @endphp
                                               

                                                <span class="badge {{ $badgeClass }}"
                                                    style="font-size: 0.75rem; margin: 2px; padding: 5px 10px; text-transform: capitalize;">
                                                    {{ $permission->name }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>{{ $role->users_count }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-info btn-sm shadow-sm" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm shadow-sm ml-1" data-toggle="modal"
                                                    data-target="#deleteModal_{{ $role->id }}" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="modal fade" id="deleteModal_{{ $role->id }}" tabindex="-1"
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
                                                            Are you sure you want to delete the Role
                                                            <strong>"{{ $role->name }}"</strong>?
                                                            <p class="text-muted small mt-2">It Will move to trash
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form method="POST"
                                                                action="{{ route('roles.destroy', $role->id) }}">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
