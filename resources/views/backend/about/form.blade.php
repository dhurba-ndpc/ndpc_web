@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($data) ? 'Edit About Content' : 'Create About Content' }}</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-info-circle"></i> About Information
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('about.update', $data->id) : route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($data))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <!-- Image Section -->
                            <div class="col-lg-4 mb-4">
                                <div class="card border-left-primary shadow">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-image"></i> Image Preview
                                        </h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <img id="imagePreview" 
                                                 src="{{ isset($data) && $data->image ? asset('storage/' . $data->image) : '' }}" 
                                                 alt="Image Preview" 
                                                 class="img-fluid rounded" 
                                                 style="max-height: 300px; object-fit: cover;">
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="btn btn-primary btn-sm">
                                                <i class="fas fa-upload"></i> Choose Image
                                            </label>
                                            <input type="file" id="image" name="image" class="d-none" accept="image/*" onchange="previewImage(event)">
                                            @error('image')
                                                <div class="text-danger small mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <small class="text-muted d-block">Recommended: 500x500px</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="col-lg-8">
                                <!-- Language Tabs -->
                                <ul class="nav nav-tabs nav-fill mb-4 aboutPage_lang_tab" id="languageTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active {{ $errors->has('title_en') || $errors->has('description_en') || $errors->has('badge_text_en') ? 'text-danger font-weight-bold' : '' }}" id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="english" aria-selected="true">
                                            <i class="fas fa-language"></i> English
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $errors->has('title_ne') || $errors->has('description_ne') || $errors->has('badge_text_ne') ? 'text-danger font-weight-bold' : '' }}" id="nepali-tab" data-bs-toggle="tab" data-bs-target="#nepali" type="button" role="tab" aria-controls="nepali" aria-selected="false">
                                            <i class="fas fa-language"></i> नेपाली
                                        </button>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content" id="languageTabsContent">
                                    <!-- English Tab -->
                                    <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="card border-left-success">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="badge_text_en" class="form-label">
                                                        <i class="fas fa-tag text-success"></i> Badge Text
                                                    </label>
                                                    <input type="text" 
                                                           class="form-control @error('badge_text_en') is-invalid @enderror" 
                                                           id="badge_text_en" 
                                                           name="badge_text_en" 
                                                           value="{{ isset($data) ? $data->badge_text_en : old('badge_text_en') }}" 
                                                           placeholder="e.g., About Us"
                                                           >
                                                    @error('badge_text_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="title_en" class="form-label">
                                                        <i class="fas fa-heading text-success"></i> Title
                                                    </label>
                                                    <input type="text" 
                                                           class="form-control @error('title_en') is-invalid @enderror" 
                                                           id="title_en" 
                                                           name="title_en" 
                                                           value="{{ isset($data) ? $data->title_en : old('title_en') }}" 
                                                           placeholder="Enter title"
                                                           >
                                                    @error('title_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="description_en" class="form-label">
                                                        <i class="fas fa-align-left text-success"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_en') is-invalid @enderror" 
                                                              id="description_en" 
                                                              name="description_en" 
                                                              rows="4" 
                                                              placeholder="Enter description"
                                                              >{{ isset($data) ? $data->description_en : old('description_en') }}</textarea>
                                                    @error('description_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nepali Tab -->
                                    <div class="tab-pane fade" id="nepali" role="tabpanel" aria-labelledby="nepali-tab">
                                        <div class="card border-left-warning">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="badge_text_ne" class="form-label">
                                                        <i class="fas fa-tag text-warning"></i> Badge Text
                                                    </label>
                                                    <input type="text" 
                                                           class="form-control @error('badge_text_ne') is-invalid @enderror" 
                                                           id="badge_text_ne" 
                                                           name="badge_text_ne" 
                                                           value="{{ isset($data) ? $data->badge_text_ne : old('badge_text_ne') }}" 
                                                           placeholder="जस्तै, हामरो बारे"
                                                           >
                                                    @error('badge_text_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="title_ne" class="form-label">
                                                        <i class="fas fa-heading text-warning"></i> Title
                                                    </label>
                                                    <input type="text" 
                                                           class="form-control @error('title_ne') is-invalid @enderror" 
                                                           id="title_ne" 
                                                           name="title_ne" 
                                                           value="{{ isset($data) ? $data->title_ne : old('title_ne') }}" 
                                                           placeholder="शीर्षक प्रविष्ट गर्नुहोस्"
                                                           >
                                                    @error('title_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="description_ne" class="form-label">
                                                        <i class="fas fa-align-left text-warning"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_ne') is-invalid @enderror" 
                                                              id="description_ne" 
                                                              name="description_ne" 
                                                              rows="4" 
                                                              placeholder="विवरण प्रविष्ट गर्नुहोस्"
                                                              >{{ isset($data) ? $data->description_ne : old('description_ne') }}</textarea>
                                                    @error('description_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Glass Text and Status Section -->
                        <div class="row mt-4">
                            <div class="col-lg-8">
                                <div class="form-group mb-3">
                                    <label for="glass_text" class="form-label">
                                        <i class="fas fa-sparkles text-info"></i> Glass Text
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('glass_text') is-invalid @enderror" 
                                           id="glass_text" 
                                           name="glass_text" 
                                           value="{{ isset($data) ? $data->glass_text : old('glass_text') }}" 
                                           placeholder="Enter optional glass text">
                                    @error('glass_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="is_active" class="form-label">
                                        <i class="fas fa-check-circle text-success"></i> Status
                                    </label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1"
                                               {{ isset($data) && $data->is_active ? 'checked' : (old('is_active') ? 'checked' : '') }}>
                                        <label class="form-check-label" for="is_active">
                                            Active (Toggle to make this About visible on the website front-end.)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> {{ isset($data) ? 'Update' : 'Create' }}
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // Bootstrap tab functionality for older versions
        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.dataset.bsTarget);
                if (target) {
                    document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));
                    document.querySelectorAll('[role="tab"]').forEach(t => t.classList.remove('active'));
                    target.classList.add('show', 'active');
                    this.classList.add('active');
                }
            });
        });
    </script>

 
@endsection
