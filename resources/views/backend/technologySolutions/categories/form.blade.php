@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">
                {{ isset($data) ? 'Edit Technology Solution Category' : 'Create Technology Solution Category' }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('technology-solution-categories.index') }}">Technology Solution Categories</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($data) ? 'Edit Category' : 'Create Category' }}
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('technology-solution-categories.index') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-layer-group mr-2"></i>Technology Solution Category Information
                    </h6>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($data) ? route('technology-solution-categories.update', $data->id) : route('technology-solution-categories.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($data))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="nav nav-tabs nav-fill mb-4" id="technologyCategoryLanguageTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active {{ $errors->has('title_en') ? 'text-danger font-weight-bold' : '' }}"
                                            id="english-tab"
                                            data-toggle="tab"
                                            href="#english"
                                            role="tab"
                                            aria-controls="english"
                                            aria-selected="true">
                                            <i class="fas fa-language mr-1"></i> English
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $errors->has('title_ne') ? 'text-danger font-weight-bold' : '' }}"
                                            id="nepali-tab"
                                            data-toggle="tab"
                                            href="#nepali"
                                            role="tab"
                                            aria-controls="nepali"
                                            aria-selected="false">
                                            <i class="fas fa-language mr-1"></i> Nepali
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="technologyCategoryLanguageTabsContent">
                                    <div class="tab-pane fade show active" id="english" role="tabpanel"
                                        aria-labelledby="english-tab">
                                        <div class="card border-left-success">
                                            <div class="card-body">
                                                <div class="form-group mb-0">
                                                    <label for="title_en" class="form-label">
                                                        <i class="fas fa-heading text-success"></i> Category Title
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('title_en') is-invalid @enderror"
                                                        id="title_en"
                                                        name="title_en"
                                                        value="{{ old('title_en', $data->title_en ?? '') }}"
                                                        placeholder="Enter English category title">
                                                    @error('title_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nepali" role="tabpanel" aria-labelledby="nepali-tab">
                                        <div class="card border-left-warning">
                                            <div class="card-body">
                                                <div class="form-group mb-0">
                                                    <label for="title_ne" class="form-label">
                                                        <i class="fas fa-heading text-warning"></i> Category Title
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('title_ne') is-invalid @enderror"
                                                        id="title_ne"
                                                        name="title_ne"
                                                        value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                                        placeholder="Enter Nepali category title">
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
                                        <div class="form-group mb-3">
                                            <label for="position" class="form-label">
                                                <i class="fas fa-sort-numeric-down text-info"></i> Position
                                            </label>
                                            <input type="number"
                                                min="0"
                                                class="form-control @error('position') is-invalid @enderror"
                                                id="position"
                                                name="position"
                                                value="{{ old('position', $data->position ?? 0) }}"
                                                placeholder="Enter display position">
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-switch custom-control-lg mt-md-4 pt-md-2">
                                                <input type="checkbox"
                                                    class="custom-control-input"
                                                    id="is_active"
                                                    name="is_active"
                                                    value="1"
                                                    {{ old('is_active', $data->is_active ?? true) ? 'checked' : '' }}>
                                                <label class="custom-control-label font-weight-bold" for="is_active">
                                                    Publish Status
                                                </label>
                                                <p class="small text-muted">Toggle to make this category visible on the website.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">{{ isset($data) ? 'Update Category' : 'Save Category' }}</span>
                            </button>
                            <a href="{{ route('technology-solution-categories.index') }}"
                                class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-times"></i>
                                </span>
                                <span class="text">Cancel</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
