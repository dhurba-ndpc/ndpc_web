@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Gallery' : 'Create Gallery' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}">Galleries</a></li>
                    <li class="breadcrumb-item active">{{ isset($data) ? 'Edit Gallery' : 'Create Gallery' }}</li>
                </ol>
            </nav>
        </div>

        <a href="{{ route('galleries.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-image mr-2"></i>
                {{ isset($data) ? 'Update Gallery Information' : 'Gallery Information' }}
            </h6>
        </div>

        <form action="{{ isset($data) ? route('galleries.update', $data->id) : route('galleries.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            @if (isset($data))
                @method('PUT')
            @endif

            <div class="card-body">
                <div class="row">

                    {{-- Left Image Preview --}}
                    <div class="col-lg-4 text-center border-right">
                        <label class="font-weight-bold text-dark d-block mb-3">Gallery Image</label>

                        <div class="mb-3">
                            <div id="imagePreviewContainer"
                                 class="border rounded p-2 bg-light d-flex align-items-center justify-content-center"
                                 style="min-height: 220px; position: relative;">

                                @php
                                    $hasImage = isset($data) && $data->image;
                                @endphp

                                @if ($hasImage)
                                    <img id="imagePreview"
                                         src="{{ asset('storage/' . $data->image) }}"
                                         alt="{{ $data->title_en }}"
                                         class="img-fluid rounded shadow-sm"
                                         style="max-height: 200px; object-fit: cover;">
                                @else
                                    <div id="imagePlaceholder" class="text-muted text-center">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <div class="small">Image preview will appear here</div>
                                    </div>

                                    <img id="imagePreview"
                                         src=""
                                         alt="Preview"
                                         class="img-fluid rounded shadow-sm d-none"
                                         style="max-height: 200px; object-fit: cover;">
                                @endif
                            </div>
                        </div>

                        <div class="custom-file text-left">
                            <input type="file"
                                   id="image"
                                   name="image"
                                   class="custom-file-input @error('image') is-invalid @enderror"
                                   accept="image/*"
                                   onchange="previewGalleryImage(event)">
                            <label class="custom-file-label" for="image">Choose gallery image...</label>
                        </div>

                        <small class="text-muted mt-2 d-block">
                            Allowed: JPG, PNG, JPEG, WEBP. Max size: 2MB.
                        </small>

                        @error('image')
                            <span class="text-danger small d-block mt-2">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Right Form --}}
                    <div class="col-lg-8">

                        <div class="form-section-title">
                            <h6 class="m-0 font-weight-bold text-primary">Gallery Details</h6>
                        </div>

                        {{-- Album Dropdown --}}
                        <div class="form-group">
                            <label for="album_id" class="small font-weight-bold text-dark">Album</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-folder-open"></i>
                                    </span>
                                </div>

                                <select id="album_id"
                                        name="album_id"
                                        class="form-control @error('album_id') is-invalid @enderror">
                                    <option value="">Select album</option>

                                    @foreach ($albums as $album)
                                        <option value="{{ $album->id }}"
                                            {{ old('album_id', $data->album_id ?? '') == $album->id ? 'selected' : '' }}>
                                            {{ $album->title_en }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <small class="text-muted d-block mt-2">
                                Choose the album where this gallery image will appear.
                            </small>

                            @error('album_id')
                                <span class="text-danger small">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Language Tabs --}}
                        <ul class="nav nav-tabs nav-fill mb-4 aboutPage_lang_tab" id="galleryLanguageTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active {{ $errors->has('title_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
                                    id="gallery-english-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#gallery-english"
                                    type="button"
                                    role="tab"
                                    aria-controls="gallery-english"
                                    aria-selected="true">
                                    <i class="fas fa-language mr-1"></i> English
                                </button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{ $errors->has('title_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                    id="gallery-nepali-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#gallery-nepali"
                                    type="button"
                                    role="tab"
                                    aria-controls="gallery-nepali"
                                    aria-selected="false">
                                    <i class="fas fa-language mr-1"></i> Nepali
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content mb-4" id="galleryLanguageTabsContent">

                            {{-- English Tab --}}
                            <div class="tab-pane fade show active"
                                 id="gallery-english"
                                 role="tabpanel"
                                 aria-labelledby="gallery-english-tab">

                                <div class="card border-left-primary shadow-sm">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="title_en" class="small font-weight-bold text-dark">
                                                Title English
                                            </label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-heading"></i>
                                                    </span>
                                                </div>

                                                <input type="text"
                                                       id="title_en"
                                                       name="title_en"
                                                       class="form-control @error('title_en') is-invalid @enderror"
                                                       value="{{ old('title_en', $data->title_en ?? '') }}"
                                                       placeholder="Enter gallery title in English">
                                            </div>

                                            @error('title_en')
                                                <span class="text-danger small">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0">
                                            <label for="description_en" class="small font-weight-bold text-dark">
                                                Description English
                                            </label>

                                            <textarea id="description_en"
                                                      name="description_en"
                                                      rows="5"
                                                      class="form-control @error('description_en') is-invalid @enderror"
                                                      placeholder="Write gallery description in English">{{ old('description_en', $data->description_en ?? '') }}</textarea>

                                            @error('description_en')
                                                <span class="text-danger small">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- Nepali Tab --}}
                            <div class="tab-pane fade"
                                 id="gallery-nepali"
                                 role="tabpanel"
                                 aria-labelledby="gallery-nepali-tab">

                                <div class="card border-left-primary shadow-sm">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="title_ne" class="small font-weight-bold text-dark">
                                                Title Nepali
                                            </label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-language"></i>
                                                    </span>
                                                </div>

                                                <input type="text"
                                                       id="title_ne"
                                                       name="title_ne"
                                                       class="form-control @error('title_ne') is-invalid @enderror"
                                                       value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                                       placeholder="Enter gallery title in Nepali">
                                            </div>

                                            @error('title_ne')
                                                <span class="text-danger small">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0">
                                            <label for="description_ne" class="small font-weight-bold text-dark">
                                                Description Nepali
                                            </label>

                                            <textarea id="description_ne"
                                                      name="description_ne"
                                                      rows="5"
                                                      class="form-control @error('description_ne') is-invalid @enderror"
                                                      placeholder="Write gallery description in Nepali">{{ old('description_ne', $data->description_ne ?? '') }}</textarea>

                                            @error('description_ne')
                                                <span class="text-danger small">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="custom-control custom-switch custom-control-lg">
                            <input type="checkbox"
                                   class="custom-control-input"
                                   id="is_active"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', isset($data) ? $data->is_active : true) ? 'checked' : '' }}>

                            <label class="custom-control-label font-weight-bold" for="is_active">
                                Publish Status
                            </label>

                            <p class="small text-muted">
                                Toggle to make this gallery image visible on the website.
                            </p>
                        </div>

                        {{-- Actions --}}
                        <div class="form-actions mt-4 border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">
                                    {{ isset($data) ? 'Update Gallery' : 'Save Gallery' }}
                                </span>
                            </button>

                            <a href="{{ route('galleries.index') }}"
                               class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-times"></i>
                                </span>
                                <span class="text">Cancel</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        function previewGalleryImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('imagePlaceholder');
            const fileName = event.target.value.split('\\').pop();

            event.target.nextElementSibling.innerText = fileName || 'Choose gallery image...';

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');

                    if (placeholder) {
                        placeholder.classList.add('d-none');
                    }
                };

                reader.readAsDataURL(file);
            }
        }

        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();

                const target = document.querySelector(this.dataset.bsTarget);

                if (target) {
                    document.querySelectorAll('#galleryLanguageTabsContent .tab-pane').forEach(function(pane) {
                        pane.classList.remove('show', 'active');
                    });

                    document.querySelectorAll('#galleryLanguageTabs [role="tab"]').forEach(function(tabButton) {
                        tabButton.classList.remove('active');
                        tabButton.setAttribute('aria-selected', 'false');
                    });

                    target.classList.add('show', 'active');
                    this.classList.add('active');
                    this.setAttribute('aria-selected', 'true');
                }
            });
        });
    </script>
@endpush