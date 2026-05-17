@extends('backend.layout.main')

@section('content')
    @php
        $sectionData = $section ?? $technologySolutionSection ?? null;
    @endphp

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Technology Solution Items</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Technology Solution Items</li>
                </ol>
            </nav>
        </div>
        @can('TechnologySolutionItem-Create')
            <a href="{{ route('technology-solution-items.create') }}"
                class="btn btn-primary btn-sm btn-icon-split shadow-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-plus fa-sm"></i>
                </span>
                <span class="text">Create Solution Item</span>
            </a>
        @endcan
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">
                <i class="fas fa-sliders-h mr-2"></i>Technology Solution Section
            </h6>
        </div>
        <div class="card-body">
            <form
                action="{{ $sectionData ? route('technology-solution-sections.update', $sectionData->id) : route('technology-solution-sections.store') }}"
                method="POST">
                @csrf
                @if ($sectionData)
                    @method('PUT')
                @endif

                <ul class="nav nav-tabs nav-fill mb-4" id="technologySectionLanguageTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active {{ $errors->has('title_en') ? 'text-danger font-weight-bold' : '' }}"
                            id="section-english-tab"
                            data-toggle="tab"
                            href="#section-english"
                            role="tab"
                            aria-controls="section-english"
                            aria-selected="true">
                            <i class="fas fa-language mr-1"></i> English
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $errors->has('title_ne') ? 'text-danger font-weight-bold' : '' }}"
                            id="section-nepali-tab"
                            data-toggle="tab"
                            href="#section-nepali"
                            role="tab"
                            aria-controls="section-nepali"
                            aria-selected="false">
                            <i class="fas fa-language mr-1"></i> Nepali
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="technologySectionLanguageTabsContent">
                    <div class="tab-pane fade show active" id="section-english" role="tabpanel"
                        aria-labelledby="section-english-tab">
                        <div class="card border-left-success">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <label for="section_title_en" class="form-label">
                                        <i class="fas fa-heading text-success"></i> Section Title short description
                                    </label>
                                    <textarea class="form-control @error('title_en') is-invalid @enderror"
                                        id="section_title_en"
                                        name="title_en"
                                        rows="3"
                                        placeholder="Enter English section title">{{ old('title_en', $sectionData->title_en ?? '') }}</textarea>
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="section-nepali" role="tabpanel" aria-labelledby="section-nepali-tab">
                        <div class="card border-left-warning">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <label for="section_title_ne" class="form-label">
                                        <i class="fas fa-heading text-warning"></i> Section Title short Description 
                                    </label>
                                    <textarea class="form-control @error('title_ne') is-invalid @enderror"
                                        id="section_title_ne"
                                        name="title_ne"
                                        rows="3"
                                        placeholder="Enter Nepali section title">{{ old('title_ne', $sectionData->title_ne ?? '') }}</textarea>
                                    @error('title_ne')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="custom-control custom-switch custom-control-lg">
                            <input type="checkbox"
                                class="custom-control-input"
                                id="section_is_active"
                                name="is_active"
                                value="1"
                                {{ old('is_active', $sectionData->is_active ?? true) ? 'checked' : '' }}>
                            <label class="custom-control-label font-weight-bold" for="section_is_active">
                                Publish Status
                            </label>
                            <p class="small text-muted">Toggle to make the technology solution section visible on the website.</p>
                        </div>
                    </div>
                </div>

                <hr>

                <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <span class="text">{{ $sectionData ? 'Update Section' : 'Save Section' }}</span>
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-cubes mr-2"></i>Technology Solution Item List
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr class="text-dark">
                            <th width="5%">S.No</th>
                            <th width="10%">Image</th>
                            <th width="14%">Category</th>
                            <th>English Content</th>
                            <th>Nepali Content</th>
                            <th width="14%">Stats</th>
                            <th width="12%">Status</th>
                            <th width="12%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lists as $list)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center">
                                    @if ($list->image)
                                        <img src="{{ asset('storage/' . $list->image) }}"
                                            class="img-thumbnail shadow-sm"
                                            style="width: 80px; height: 80px; object-fit: cover;"
                                            alt="{{ $list->title_en ?? 'Technology solution image' }}">
                                    @else
                                        <div class="bg-light border rounded d-flex align-items-center justify-content-center mx-auto text-muted"
                                            style="width: 80px; height: 80px;">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <span class="badge badge-pill badge-info shadow-sm px-3">
                                        {{ $list->category->title_en ?? $list->category->title_ne ?? '-' }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <div class="font-weight-bold text-dark">{{ $list->title_en ?? '-' }}</div>
                                    <div class="small text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($list->short_description_en), 70) }}</div>
                                    <div class="small mt-1">
                                        <span class="badge badge-light border">{{ $list->use_case_title_en ?? '-' }}</span>
                                        <span class="text-muted">{{ $list->glass_text_en ?? '' }}</span>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="font-weight-bold text-dark">{{ $list->title_ne ?? '-' }}</div>
                                    <div class="small text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($list->short_description_ne), 70) }}</div>
                                    <div class="small mt-1">
                                        <span class="badge badge-light border">{{ $list->use_case_title_ne ?? '-' }}</span>
                                        <span class="text-muted">{{ $list->glass_text_ne ?? '' }}</span>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="small text-dark">
                                        <span class="font-weight-bold">{{ $list->stat_one_value ?? '-' }}</span>
                                        <span class="text-muted">{{ $list->stat_one_label_en ?? '' }}</span>
                                    </div>
                                    <div class="small text-dark">
                                        <span class="font-weight-bold">{{ $list->stat_two_value ?? '-' }}</span>
                                        <span class="text-muted">{{ $list->stat_two_label_en ?? '' }}</span>
                                    </div>
                                    <div class="small text-dark">
                                        <span class="font-weight-bold">{{ $list->stat_three_value ?? '-' }}</span>
                                        <span class="text-muted">{{ $list->stat_three_label_en ?? '' }}</span>
                                    </div>
                                    <div class="small text-dark">
                                        <span class="font-weight-bold">{{ $list->stat_four_value ?? '-' }}</span>
                                        <span class="text-muted">{{ $list->stat_four_label_en ?? '' }}</span>
                                    </div>
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
                                        @can('TechnologySolutionItem-Edit')
                                            <a href="{{ route('technology-solution-items.edit', $list->id) }}"
                                                class="btn btn-info btn-sm shadow-sm"
                                                title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        @endcan
                                        @can('TechnologySolutionItem-Delete')
                                            <button class="btn btn-danger btn-sm shadow-sm ml-1"
                                                data-toggle="modal"
                                                data-target="#deleteModal_{{ $list->id }}"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endcan
                                    </div>

                                    @can('TechnologySolutionItem-Delete')
                                    <div class="modal fade" id="deleteModal_{{ $list->id }}" tabindex="-1" role="dialog"
                                        aria-hidden="true">
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
                                                    Are you sure you want to delete solution item
                                                    <strong>"{{ $list->title_en ?? $list->title_ne ?? 'this item' }}"</strong>?
                                                    <p class="text-muted small mt-2">This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form method="POST"
                                                        action="{{ route('technology-solution-items.destroy', $list->id) }}">
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
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-cubes fa-2x mb-2 d-block"></i>
                                    No technology solution items found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
