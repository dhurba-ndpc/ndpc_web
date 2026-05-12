@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Blog Category' : 'Create Blog Category' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blogCategory.index') }}">Blog Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($data) ? 'Edit Category' : 'Create Category' }}</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('blogCategory.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-folder-open mr-2"></i>{{ isset($data) ? 'Update Category Information' : 'Category Information' }}
                    </h6>
                </div>

                <form action="{{ isset($data) ? route('blogCategory.update', $data->id) : route('blogCategory.store') }}" method="POST">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="form-section-title">
                            <h6 class="m-0 font-weight-bold text-primary">Category Details</h6>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title_en" class="small font-weight-bold text-dark">Title English</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input type="text" id="title_en" name="title_en"
                                        class="form-control @error('title_en') is-invalid @enderror"
                                        value="{{ old('title_en', $data->title_en ?? '') }}"
                                        placeholder="Enter category title in English">
                                </div>
                                @error('title_en')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="title_ne" class="small font-weight-bold text-dark">Title Nepali</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-language"></i></span>
                                    </div>
                                    <input type="text" id="title_ne" name="title_ne"
                                        class="form-control @error('title_ne') is-invalid @enderror"
                                        value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                        placeholder="Enter category title in Nepali">
                                </div>
                                @error('title_ne')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="slug" class="small font-weight-bold text-dark">Slug</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                                    </div>
                                    <input readonly type="text" id="slug" name="slug"
                                        class="form-control @error('slug') is-invalid @enderror"
                                        value="{{ old('slug', $data->slug ?? '') }}"
                                        placeholder="auto-generated-from-title">
                                </div>
                                <small class="text-muted d-block mt-2">Leave empty to generate from the English title.</small>
                                @error('slug')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="small font-weight-bold text-dark d-block">Publish Status</label>
                                <div class="custom-control custom-switch custom-control-lg mt-2">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1"
                                        {{ old('is_active', isset($data) ? $data->is_active : true) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="is_active">
                                        Active Category
                                    </label>
                                    <p class="small text-muted mb-0">Toggle to make this category available for blog posts.</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions mt-5 border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">{{ isset($data) ? 'Update Category' : 'Save Category' }}</span>
                            </button>
                            <a href="{{ route('blogCategory.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                <span class="icon text-white-50"><i class="fas fa-times"></i></span>
                                <span class="text">Cancel</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
