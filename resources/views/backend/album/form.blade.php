@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Album' : 'Create Album' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('albums.index') }}">Albums</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($data) ? 'Edit Album' : 'Create Album' }}</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('albums.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-images mr-2"></i>{{ isset($data) ? 'Update Album Information' : 'Album Information' }}
                    </h6>
                </div>

                <form action="{{ isset($data) ? route('albums.update', $data->id) : route('albums.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 text-center border-right">
                                <label class="font-weight-bold text-dark d-block mb-3">Album Cover Image</label>

                                <div class="mb-3">
                                    <div id="imagePreviewContainer" class="border rounded p-2 bg-light d-flex align-items-center justify-content-center" style="min-height: 220px; position: relative;">
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
                                            <img id="imagePreview" src="" alt="Preview" class="img-fluid rounded shadow-sm d-none" style="max-height: 200px; object-fit: cover;">
                                        @endif
                                    </div>
                                </div>

                                <div class="custom-file text-left">
                                    <input type="file" id="image" name="image"
                                        class="custom-file-input @error('image') is-invalid @enderror"
                                        accept="image/*" onchange="previewAlbumImage(event)">
                                    <label class="custom-file-label" for="image">Choose cover image...</label>
                                </div>
                                <small class="text-muted mt-2 d-block">Allowed: JPG, PNG, JPEG, WEBP. Max size: 2MB.</small>
                                @error('image')
                                    <span class="text-danger small d-block mt-2"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-lg-8">
                                <div class="form-section-title">
                                    <h6 class="m-0 font-weight-bold text-primary">Album Details</h6>
                                </div>

                                <ul class="nav nav-tabs nav-fill mb-4 aboutPage_lang_tab" id="albumLanguageTabs"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link active {{ $errors->has('title_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
                                            id="album-english-tab" data-bs-toggle="tab" data-bs-target="#album-english"
                                            type="button" role="tab" aria-controls="album-english" aria-selected="true">
                                            <i class="fas fa-language mr-1"></i> English
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link {{ $errors->has('title_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                            id="album-nepali-tab" data-bs-toggle="tab" data-bs-target="#album-nepali"
                                            type="button" role="tab" aria-controls="album-nepali" aria-selected="false">
                                            <i class="fas fa-language mr-1"></i> Nepali
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content mb-4" id="albumLanguageTabsContent">
                                    <div class="tab-pane fade show active" id="album-english" role="tabpanel"
                                        aria-labelledby="album-english-tab">
                                        <div class="card border-left-primary shadow-sm">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="title_en" class="small font-weight-bold text-dark">Title
                                                        English</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-heading"></i></span>
                                                        </div>
                                                        <input type="text" id="title_en" name="title_en"
                                                            class="form-control @error('title_en') is-invalid @enderror"
                                                            value="{{ old('title_en', $data->title_en ?? '') }}"
                                                            placeholder="Enter album title in English">
                                                    </div>
                                                    @error('title_en')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_en"
                                                        class="small font-weight-bold text-dark">Description English</label>
                                                    <textarea id="description_en" name="description_en" rows="5"
                                                        class="form-control @error('description_en') is-invalid @enderror"
                                                        placeholder="Write album description in English">{{ old('description_en', $data->description_en ?? '') }}</textarea>
                                                    @error('description_en')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="album-nepali" role="tabpanel"
                                        aria-labelledby="album-nepali-tab">
                                        <div class="card border-left-primary shadow-sm">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="title_ne" class="small font-weight-bold text-dark">Title
                                                        Nepali</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-language"></i></span>
                                                        </div>
                                                        <input type="text" id="title_ne" name="title_ne"
                                                            class="form-control @error('title_ne') is-invalid @enderror"
                                                            value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                                            placeholder="Enter album title in Nepali">
                                                    </div>
                                                    @error('title_ne')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_ne"
                                                        class="small font-weight-bold text-dark">Description Nepali</label>
                                                    <textarea id="description_ne" name="description_ne" rows="5"
                                                        class="form-control @error('description_ne') is-invalid @enderror"
                                                        placeholder="Write album description in Nepali">{{ old('description_ne', $data->description_ne ?? '') }}</textarea>
                                                    @error('description_ne')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              

                                <div class="custom-control custom-switch custom-control-lg">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1"
                                        {{ old('is_active', isset($data) ? $data->is_active : true) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="is_active">Publish Status</label>
                                    <p class="small text-muted">Toggle to make this album visible on the website.</p>
                                </div>

                                <div class="form-actions mt-4 border-top pt-4">
                                    <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                        <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                        <span class="text">{{ isset($data) ? 'Update Album' : 'Save Album' }}</span>
                                    </button>
                                    <a href="{{ route('albums.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                        <span class="icon text-white-50"><i class="fas fa-times"></i></span>
                                        <span class="text">Cancel</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function previewAlbumImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('imagePlaceholder');
            const fileName = event.target.value.split('\\').pop();

            event.target.nextElementSibling.innerText = fileName || 'Choose cover image...';

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
                    document.querySelectorAll('#albumLanguageTabsContent .tab-pane').forEach(function(pane) {
                        pane.classList.remove('show', 'active');
                    });
                    document.querySelectorAll('#albumLanguageTabs [role="tab"]').forEach(function(tabButton) {
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
