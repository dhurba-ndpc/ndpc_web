@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Menu Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Menus</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm btn-icon-split shadow-sm">
            <span class="icon text-white-50">
                <i class="fas fa-plus fa-sm"></i>
            </span>
            <span class="text">Create New Menu</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-bars mr-2"></i>Menu List
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr class="text-dark">
                            <th width="5%">S.No</th>
                            <th>Menu</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th width="10%">Position</th>
                            <th width="12%">Status</th>
                            <th width="12%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lists ?? [] as $list)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">
                                    <div class="font-weight-bold text-dark">{{ $list->menu_name }}</div>
                                    @if ($list->slug)
                                        <div class="small text-muted">{{ $list->slug }}</div>
                                    @endif
                                    @if ($list->parent_id)
                                        <span class="badge badge-primary mt-1">
                                            <i class="fas fa-level-up-alt mr-1"></i>
                                            Child of #{{ $list->parent_id }}
                                        </span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($list->is_main_child === 'child_menu')
                                        <span class="badge badge-secondary">Child Menu</span>
                                    @else
                                        <span class="badge badge-primary">Parent Menu</span>
                                    @endif
                                </td>
                                <td class="align-middle text-capitalize">
                                    {{ str_replace('_', ' & ', $list->menu_location) }}
                                </td>
                                <td class="align-middle">{{ $list->position }}</td>
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
                                        <a href="{{ route('menu.edit', $list->id) }}"
                                            class="btn btn-info btn-sm shadow-sm" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm shadow-sm ml-1" data-toggle="modal"
                                            data-target="#deleteModal_{{ $list->id }}" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <div class="modal fade" id="deleteModal_{{ $list->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content border-0 shadow-lg">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title font-weight-bold">
                                                        <i class="fas fa-exclamation-triangle mr-2"></i>Confirm Delete
                                                    </h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left p-4">
                                                    Are you sure you want to delete the menu
                                                    <strong>"{{ $list->menu_name }}"</strong>?
                                                    <p class="text-muted small mt-2">This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form method="POST" action="{{ route('menu.destroy', $list->id) }}">
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
                                <td colspan="7" class="text-center py-5 text-gray-500">
                                    No menus found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
