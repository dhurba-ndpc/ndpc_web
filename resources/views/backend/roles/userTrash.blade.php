@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">User Trash Bin</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Trash</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-users fa-sm text-white-50 mr-1"></i> Active Users
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-bottom-warning">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-warning">
                        <i class="fas fa-user-slash mr-2"></i>User Trash Bin
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover border-0" id="trashTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-xs font-weight-bold text-gray-600 text-uppercase bg-gray-100">
                                    <th class="border-0">User</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Deleted At</th>
                                    <th class="border-0 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr class="align-middle">
                                        <td class="font-weight-bold text-gray-800">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><span class="small">{{ $user->deleted_at->diffForHumans() }}</span></td>
                                        <td class="text-center">
                                            <!-- Restore -->
                                            <form action="{{ route('users.restore', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button class="btn btn-sm btn-success btn-icon-split shadow-sm mx-1">
                                                    <span class="icon text-white-50"><i class="fas fa-undo"></i></span>
                                                    <span class="text">Restore</span>
                                                </button>
                                            </form>

                                            <!-- Permanent Delete -->
                                            <button class="btn btn-sm btn-danger btn-icon-split shadow-sm mx-1"
                                                data-toggle="modal" data-target="#forceDelete{{ $user->id }}">
                                                <span class="icon text-white-50"><i class="fas fa-skull"></i></span>
                                                <span class="text">Delete</span>
                                            </button>

                                            <!-- Force Delete Modal -->
                                            <div class="modal fade" id="forceDelete{{ $user->id }}" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content border-0 shadow-lg">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title font-weight-bold">Permanent Deletion</h5>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            This will permanently delete
                                                            <strong>{{ $user->name }}</strong> and remove all roles. This
                                                            cannot be undone.
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('users.forceDelete', $user->id) }}"
                                                                method="POST">
                                                                @csrf @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm px-4">Delete
                                                                    Permanently</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-gray-500">Trash is empty.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
