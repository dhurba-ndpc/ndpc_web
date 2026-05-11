@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Dark Banner' : 'Create Dark Banner' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('darkbanner.index') }}">Dark Banner</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($data) ? 'Edit Dark Banner' : 'Create Dark Banner' }}</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('darkbanner.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-moon"></i> Dark Banner Information
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('darkbanner.update', $data->id) : route('darkbanner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($data))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="card border-left-primary shadow h-100">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-image"></i> Image Preview
                                        </h6>
                                    </div>
                                    <div class="card-body text-center">
                                        @php
                                            $hasImage = isset($data) && $data->image;
                                        @endphp

                                        <div class="border rounded p-2 bg-light d-flex align-items-center justify-content-center mb-3" style="min-height: 240px;">
                                            <img id="darkBannerImagePreview"
                                                 src="{{ $hasImage ? asset('storage/' . $data->image) : asset('backend/img/placeholder.jpg') }}"
                                                 alt="Dark Banner Image Preview"
                                                 class="img-fluid rounded shadow-sm"
                                                 style="max-height: 220px; object-fit: cover; {{ $hasImage ? '' : 'opacity: 0.5;' }}">
                                        </div>

                                        <div class="custom-file text-left">
                                            <input type="file"
                                                   name="image"
                                                   class="custom-file-input @error('image') is-invalid @enderror"
                                                   id="image"
                                                   accept="image/*"
                                                   onchange="previewDarkBannerImage(event)">
                                            <label class="custom-file-label" for="image">Choose image...</label>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <small class="text-muted mt-2 d-block">Recommended image size: 1920x800px</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <ul class="nav nav-tabs nav-fill mb-4" id="darkBannerLanguageTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active {{ $errors->has('title_en') || $errors->has('subtitle_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
                                                id="english-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#english"
                                                type="button"
                                                role="tab"
                                                aria-controls="english"
                                                aria-selected="true">
                                            <i class="fas fa-language"></i> English
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $errors->has('title_np') || $errors->has('subtitle_np') || $errors->has('description_np') ? 'text-danger font-weight-bold' : '' }}"
                                                id="nepali-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#nepali"
                                                type="button"
                                                role="tab"
                                                aria-controls="nepali"
                                                aria-selected="false">
                                            <i class="fas fa-language"></i> Nepali
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="darkBannerLanguageTabsContent">
                                    <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="card border-left-success">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="title_en" class="form-label">
                                                        <i class="fas fa-heading text-success"></i> Title
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('title_en') is-invalid @enderror"
                                                           id="title_en"
                                                           name="title_en"
                                                           value="{{ isset($data) ? $data->title_en : old('title_en') }}"
                                                           placeholder="Enter English title">
                                                    @error('title_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="subtitle_en" class="form-label">
                                                        <i class="fas fa-quote-left text-success"></i> Subtitle
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('subtitle_en') is-invalid @enderror"
                                                           id="subtitle_en"
                                                           name="subtitle_en"
                                                           value="{{ isset($data) ? $data->subtitle_en : old('subtitle_en') }}"
                                                           placeholder="Enter English subtitle">
                                                    @error('subtitle_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_en" class="form-label">
                                                        <i class="fas fa-align-left text-success"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_en') is-invalid @enderror"
                                                              id="description_en"
                                                              name="description_en"
                                                              rows="6"
                                                              placeholder="Enter English description">{{ isset($data) ? $data->description_en : old('description_en') }}</textarea>
                                                    @error('description_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nepali" role="tabpanel" aria-labelledby="nepali-tab">
                                        <div class="card border-left-warning">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="title_np" class="form-label">
                                                        <i class="fas fa-heading text-warning"></i> Title
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('title_np') is-invalid @enderror"
                                                           id="title_np"
                                                           name="title_np"
                                                           value="{{ isset($data) ? $data->title_np : old('title_np') }}"
                                                           placeholder="Enter Nepali title">
                                                    @error('title_np')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="subtitle_np" class="form-label">
                                                        <i class="fas fa-quote-left text-warning"></i> Subtitle
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('subtitle_np') is-invalid @enderror"
                                                           id="subtitle_np"
                                                           name="subtitle_np"
                                                           value="{{ isset($data) ? $data->subtitle_np : old('subtitle_np') }}"
                                                           placeholder="Enter Nepali subtitle">
                                                    @error('subtitle_np')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_ne" class="form-label">
                                                        <i class="fas fa-align-left text-warning"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_np') is-invalid @enderror"
                                                              id="description_ne"
                                                              name="description_np"
                                                              rows="6"
                                                              placeholder="Enter Nepali description">{{ isset($data) ? $data->description_np : old('description_np') }}</textarea>
                                                    @error('description_np')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 mt-4">
                                    <div class="custom-control custom-switch custom-control-lg">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="is_active"
                                               name="is_active"
                                               value="1"
                                               {{ (isset($data) && $data->is_active) || old('is_active') ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">
                                            Publish Status
                                        </label>
                                        <p class="small text-muted">Toggle to make this dark banner visible on the website front-end.</p>
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
                                <span class="text">{{ isset($data) ? 'Update Dark Banner' : 'Save Dark Banner' }}</span>
                            </button>
                            <a href="{{ route('darkbanner.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
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
        function previewDarkBannerImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('darkBannerImagePreview');
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
                    document.querySelectorAll('#darkBannerLanguageTabsContent .tab-pane').forEach(pane => pane.classList.remove('show', 'active'));
                    document.querySelectorAll('#darkBannerLanguageTabs [role="tab"]').forEach(item => item.classList.remove('active'));
                    target.classList.add('show', 'active');
                    this.classList.add('active');
                }
            });
        });
    </script>
@endpush
