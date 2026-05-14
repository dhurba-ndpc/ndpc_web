@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Company Goal' : 'Create Company Goal' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('company_goals.index') }}">Company Goals</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($data) ? 'Edit Company Goal' : 'Create Company Goal' }}</li>
                </ol>
            </nav>
        </div>
       
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-bullseye"></i> Company Goal Information
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('company_goals.update', $data->id) : route('company_goals.store') }}" method="POST" enctype="multipart/form-data">
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

                                        <div id="companyGoalImagePreviewBox" class="border rounded p-2 bg-light d-flex align-items-center justify-content-center mb-3" style="min-height: 240px;">
                                            <img id="companyGoalImagePreview"
                                                 src="{{ $hasImage ? asset('storage/' . $data->image) : asset('backend/img/placeholder.jpg') }}"
                                                 alt="Company Goal Image Preview"
                                                 class="img-fluid rounded shadow-sm"
                                                 style="max-height: 220px; object-fit: cover; {{ $hasImage ? '' : 'opacity: 0.5;' }}">
                                        </div>

                                        <div class="custom-file text-left">
                                            <input type="file"
                                                   name="image"
                                                   class="custom-file-input @error('image') is-invalid @enderror"
                                                   id="image"
                                                   accept="image/*"
                                                   onchange="previewCompanyGoalImage(event)">
                                            <label class="custom-file-label" for="image">Choose image...</label>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <small class="text-muted mt-2 d-block">Recommended image size: 800x600px</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <ul class="nav nav-tabs nav-fill mb-4" id="companyGoalLanguageTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active {{ $errors->has('badge_title_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
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
                                        <button class="nav-link {{ $errors->has('badge_title_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
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

                                <div class="tab-content" id="companyGoalLanguageTabsContent">
                                    <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="card border-left-success">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="badge_title_en" class="form-label">
                                                        <i class="fas fa-tag text-success"></i> Badge Title
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('badge_title_en') is-invalid @enderror"
                                                           id="badge_title_en"
                                                           name="badge_title_en"
                                                           value="{{ old('badge_title_en', $data->badge_title_en ?? '') }}"
                                                           placeholder="Enter English badge title">
                                                    @error('badge_title_en')
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
                                                              placeholder="Enter English description">{{ old('description_en', $data->description_en ?? '') }}</textarea>
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
                                                    <label for="badge_title_ne" class="form-label">
                                                        <i class="fas fa-tag text-warning"></i> Badge Title
                                                    </label>
                                                    <input type="text"
                                                           class="form-control @error('badge_title_ne') is-invalid @enderror"
                                                           id="badge_title_ne"
                                                           name="badge_title_ne"
                                                           value="{{ old('badge_title_ne', $data->badge_title_ne ?? '') }}"
                                                           placeholder="Enter Nepali badge title">
                                                    @error('badge_title_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_ne" class="form-label">
                                                        <i class="fas fa-align-left text-warning"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_ne') is-invalid @enderror"
                                                              id="description_ne"
                                                              name="description_ne"
                                                              rows="6"
                                                              placeholder="Enter Nepali description">{{ old('description_ne', $data->description_ne ?? '') }}</textarea>
                                                    @error('description_ne')
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
                                                <p class="small text-muted">Toggle to make this company goal visible on the website front-end.</p>
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
                                <span class="text">{{ isset($data) ? 'Update Company Goal' : 'Save Company Goal' }}</span>
                            </button>
                            <a href="{{ route('company_goals.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
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
        function previewCompanyGoalImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('companyGoalImagePreview');
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

        document.querySelectorAll('#companyGoalLanguageTabs [data-bs-toggle="tab"]').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.dataset.bsTarget);

                if (target) {
                    document.querySelectorAll('#companyGoalLanguageTabsContent .tab-pane').forEach(pane => pane.classList.remove('show', 'active'));
                    document.querySelectorAll('#companyGoalLanguageTabs [role="tab"]').forEach(item => item.classList.remove('active'));
                    target.classList.add('show', 'active');
                    this.classList.add('active');
                }
            });
        });
    </script>
@endpush
