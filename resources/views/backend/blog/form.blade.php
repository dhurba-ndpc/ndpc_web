@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Blog' : 'Create Blog' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blogs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($data) ? 'Edit Blog' : 'Create Blog' }}
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('blog.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-blog"></i> Blog Information
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('blog.update', $data->id) : route('blog.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($data))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="card border-left-primary shadow mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-image"></i> Featured Image
                                        </h6>
                                    </div>
                                    <div class="card-body text-center">
                                        @php
                                            $hasImage = isset($data) && $data->image;
                                        @endphp

                                        <div class="border rounded p-2 bg-light d-flex align-items-center justify-content-center mb-3"
                                            style="min-height: 240px;">
                                            <img id="blogImagePreview"
                                                src="{{ $hasImage ? asset('storage/' . $data->image) : asset('backend/img/placeholder.jpg') }}"
                                                alt="Blog Image Preview" class="img-fluid rounded shadow-sm"
                                                style="max-height: 220px; object-fit: cover; {{ $hasImage ? '' : 'opacity: 0.5;' }}">
                                        </div>

                                        <div class="custom-file text-left">
                                            <input type="file" name="image"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                id="image" accept="image/*" onchange="previewBlogImage(event)">
                                            <label class="custom-file-label" for="image">Choose image...</label>
                                            @error('image')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <small class="text-muted mt-2 d-block">Recommended image size: 1200x800px</small>
                                    </div>
                                </div>

                                <div class="card border-left-info shadow">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-info">
                                            <i class="fas fa-folder-open"></i> Blog Categories
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        @error('blog_category_id')
                                            <div class="alert alert-danger py-2 small">{{ $message }}</div>
                                        @enderror
                                        @foreach ($categories as $category)
                                            <div class="border rounded p-3 bg-light"
                                                style="max-height: 280px; overflow-y: auto;">
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control-input" id="category_{{$category->id}}"
                                                        name="blog_category_id[]" {{ isset($data) && $data->categories->contains($category->id) ? 'checked' : ''}} value="{{$category->id}}">
                                                    <label class="custom-control-label" for="category_{{ $category->id }}">
                                                        <span class="font-weight-bold text-dark">{{$category->title_en}}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        <small class="text-muted mt-2 d-block">Select one or more categories for this
                                            blog.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group mb-4">
                                    <label for="slug" class="form-label">
                                        <i class="fas fa-link text-info"></i> Slug
                                    </label>
                                    <input readonly type="text" class="form-control @error('slug') is-invalid @enderror"
                                        id="slug" name="slug"
                                        value="{{ isset($data) ? $data->slug : old('slug') }}"
                                        placeholder="Auto generated field blog slug">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <ul class="nav nav-tabs nav-fill mb-4" id="blogLanguageTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link active {{ $errors->has('title_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
                                            id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button"
                                            role="tab" aria-controls="english" aria-selected="true">
                                            <i class="fas fa-language"></i> English
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link {{ $errors->has('title_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                            id="nepali-tab" data-bs-toggle="tab" data-bs-target="#nepali" type="button"
                                            role="tab" aria-controls="nepali" aria-selected="false">
                                            <i class="fas fa-language"></i> Nepali
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="blogLanguageTabsContent">
                                    <div class="tab-pane fade show active" id="english" role="tabpanel"
                                        aria-labelledby="english-tab">
                                        <div class="card border-left-success">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="title_en" class="form-label">
                                                        <i class="fas fa-heading text-success"></i> Title
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('title_en') is-invalid @enderror"
                                                        id="title_en" name="title_en"
                                                        value="{{ isset($data) ? $data->title_en : old('title_en') }}"
                                                        placeholder="Enter English title">
                                                    @error('title_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_en" class="form-label">
                                                        <i class="fas fa-align-left text-success"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en"
                                                        name="description_en" rows="8" placeholder="Enter English description">{{ isset($data) ? $data->description_en : old('description_en') }}</textarea>
                                                    @error('description_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nepali" role="tabpanel"
                                        aria-labelledby="nepali-tab">
                                        <div class="card border-left-warning">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="title_ne" class="form-label">
                                                        <i class="fas fa-heading text-warning"></i> Title
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('title_ne') is-invalid @enderror"
                                                        id="title_ne" name="title_ne"
                                                        value="{{ isset($data) ? $data->title_ne : old('title_ne') }}"
                                                        placeholder="Enter Nepali title">
                                                    @error('title_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_ne" class="form-label">
                                                        <i class="fas fa-align-left text-warning"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_ne') is-invalid @enderror" id="description_ne"
                                                        name="description_ne" rows="8" placeholder="Enter Nepali description">{{ isset($data) ? $data->description_ne : old('description_ne') }}</textarea>
                                                    @error('description_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 mt-4">
                                    <div class="custom-control custom-switch custom-control-lg">
                                        <input type="checkbox" class="custom-control-input" id="is_active"
                                            name="is_active" value="1"
                                            {{ (isset($data) && $data->is_active) || old('is_active') ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">
                                            Publish Status
                                        </label>
                                        <p class="small text-muted">Toggle to make this blog visible on the website
                                            front-end.</p>
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
                                <span class="text">{{ isset($data) ? 'Update Blog' : 'Save Blog' }}</span>
                            </button>
                            <a href="{{ route('blog.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
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

@push('script')
    <script>
        function previewBlogImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('blogImagePreview');
            const fileName = event.target.value.split('\\').pop();

            event.target.nextElementSibling.innerText = fileName || 'Choose image...';

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.opacity = '1';
                };
                reader.readAsDataURL(file);
            }
        }

        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.dataset.bsTarget);

                if (target) {
                    document.querySelectorAll('#blogLanguageTabsContent .tab-pane').forEach(pane => pane
                        .classList.remove('show', 'active'));
                    document.querySelectorAll('#blogLanguageTabs [role="tab"]').forEach(item => item
                        .classList.remove('active'));
                    target.classList.add('show', 'active');
                    this.classList.add('active');
                }
            });
        });
    </script>
@endpush
