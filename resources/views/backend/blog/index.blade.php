@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Blog Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex flex-wrap">
            <a href="{{ route('blogCategory.create') }}" class="btn btn-success btn-sm btn-icon-split shadow-sm mr-2 mb-2 mb-sm-0">
                <span class="icon text-white-50">
                    <i class="fas fa-folder-plus fa-sm"></i>
                </span>
                <span class="text">Create Category</span>
            </a>
            <a href="{{ route('blogCategory.index') }}" class="btn btn-info btn-sm btn-icon-split shadow-sm mr-2 mb-2 mb-sm-0">
                <span class="icon text-white-50">
                    <i class="fas fa-folder-open fa-sm"></i>
                </span>
                <span class="text">View Categories</span>
            </a>
            <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-plus fa-sm"></i>
                </span>
                <span class="text">Create Blog</span>
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-blog mr-2"></i>Blog List
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr class="text-dark">
                            <th width="5%">S.No</th>
                            <th width="12%">Image</th>
                            <th>Blog Information</th>
                            <th width="18%">Categories</th>
                            <th width="12%">Author</th>
                            <th width="10%">Status</th>
                            <th width="12%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lists as $list)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center">
                                    @if ($list->image)
                                        <img src="{{ asset('storage/' . $list->image) }}"
                                             class="img-thumbnail shadow-sm"
                                             style="width: 90px; height: 60px; object-fit: cover;"
                                             alt="{{ $list->title_en }}">
                                    @else
                                        <div class="bg-light border rounded d-flex align-items-center justify-content-center mx-auto text-muted"
                                             style="width: 90px; height: 60px;">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="font-weight-bold text-dark">{{ $list->title_en }}</div>
                                    @if(!empty($list->title_ne))
                                        <div class="small text-muted">{{ $list->title_ne }}</div>
                                    @endif
                                    <div class="small text-info mt-1">
                                        <i class="fas fa-link mr-1"></i>{{ $list->slug }}
                                    </div>
                                </td>
                                <td class="align-middle">
                                    @if(isset($list->categories) && $list->categories->count())
                                        @foreach($list->categories as $category)
                                            <span class="badge badge-pill badge-info shadow-sm px-2 mb-1">
                                                {{ $category->title_en }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="text-muted small">No category</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <span class="text-dark">
                                        {{ optional($list->user)->name ?? 'Admin' }}
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
                                        <a href="{{ route('blog.edit', $list->id) }}"
                                           class="btn btn-info btn-sm shadow-sm"
                                           title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm shadow-sm ml-1"
                                                data-toggle="modal"
                                                data-target="#deleteModal_{{ $list->id }}"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <div class="modal fade" id="deleteModal_{{ $list->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content border-0 shadow-lg">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title font-weight-bold">
                                                        <i class="fas fa-exclamation-triangle mr-2"></i>Confirm Delete
                                                    </h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left p-4">
                                                    Are you sure you want to delete the blog
                                                    <strong>"{{ $list->title_en }}"</strong>?
                                                    <p class="text-muted small mt-2">This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                                    <form method="POST" action="{{ route('blog.destroy', $list->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm px-4">Yes, Delete</button>
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
@endsection
