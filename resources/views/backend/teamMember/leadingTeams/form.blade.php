@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Leading Team' : 'Create Leading Team' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('leadingTeams.index') }}">Leading Teams</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($data) ? 'Edit Member' : 'Create Member' }}
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('leadingTeams.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-users-cog mr-2"></i>{{ isset($data) ? 'Update Leading Team Information' : 'Leading Team Information' }}
                    </h6>
                </div>

                <form action="{{ isset($data) ? route('leadingTeams.update', $data->id) : route('leadingTeams.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif

                    <input type="hidden" name="type" value="leading_team">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 text-center border-right mb-4 mb-lg-0">
                                <label class="font-weight-bold text-dark d-block mb-3">Member Image</label>

                                @php
                                    $hasImage = isset($data) && !empty($data->image);
                                @endphp

                                <div class="mb-3">
                                    <div class="border rounded p-2 bg-light d-flex align-items-center justify-content-center"
                                        style="min-height: 230px;">
                                        @if ($hasImage)
                                            <img id="previewImg"
                                                src="{{ asset('storage/' . $data->image) }}"
                                                alt="{{ $data->name_en }}"
                                                class="img-fluid rounded shadow-sm"
                                                style="max-height: 210px; object-fit: cover;">
                                        @else
                                            <div id="imagePlaceholder" class="text-muted">
                                                <i class="fas fa-user fa-3x mb-3 d-block"></i>
                                                <span class="small">Image preview will appear here</span>
                                            </div>
                                            <img id="previewImg"
                                                src=""
                                                alt="Preview"
                                                class="img-fluid rounded shadow-sm d-none"
                                                style="max-height: 210px; object-fit: cover;">
                                        @endif
                                    </div>
                                </div>

                                <div class="custom-file text-left">
                                    <input type="file"
                                        name="image"
                                        class="custom-file-input @error('image') is-invalid @enderror"
                                        id="image"
                                        accept="image/*"
                                        onchange="previewLeadingTeamImage(event)">
                                    <label class="custom-file-label" for="image">Choose image...</label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <small class="text-muted mt-2 d-block">Accepted formats: JPG, PNG, JPEG, WEBP.</small>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-section-title mb-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile Details</h6>
                                </div>

                                <ul class="nav nav-tabs mb-4" id="leadingTeamLanguageTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active {{ $errors->has('title_en') || $errors->has('image') ? 'text-danger font-weight-bold' : '' }}"
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
                                        <a class="nav-link"
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

                                <div class="tab-content" id="leadingTeamLanguageTabsContent">
                                    <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="form-group mb-4">
                                            <label for="name_en" class="small font-weight-bold text-dark">Name English</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text"
                                                    id="name_en"
                                                    name="name_en"
                                                    class="form-control @error('name_en') is-invalid @enderror"
                                                    value="{{ old('name_en', $data->name_en ?? '') }}"
                                                    placeholder="Enter member name in English">
                                            </div>
                                            @error('name_en')
                                                <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="designation_en" class="small font-weight-bold text-dark">Designation English</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                                </div>
                                                <input type="text"
                                                    id="designation_en"
                                                    name="designation_en"
                                                    class="form-control @error('designation_en') is-invalid @enderror"
                                                    value="{{ old('designation_en', $data->designation_en ?? '') }}"
                                                    placeholder="Enter designation in English">
                                            </div>
                                            @error('designation_en')
                                                <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nepali" role="tabpanel" aria-labelledby="nepali-tab">
                                        <div class="form-group mb-4">
                                            <label for="name_ne" class="small font-weight-bold text-dark">Name Nepali</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text"
                                                    id="name_ne"
                                                    name="name_ne"
                                                    class="form-control @error('name_ne') is-invalid @enderror"
                                                    value="{{ old('name_ne', $data->name_ne ?? '') }}"
                                                    placeholder="Enter member name in Nepali">
                                            </div>
                                            @error('name_ne')
                                                <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="designation_ne" class="small font-weight-bold text-dark">Designation Nepali</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                                </div>
                                                <input type="text"
                                                    id="designation_ne"
                                                    name="designation_ne"
                                                    class="form-control @error('designation_ne') is-invalid @enderror"
                                                    value="{{ old('designation_ne', $data->designation_ne ?? '') }}"
                                                    placeholder="Enter designation in Nepali">
                                            </div>
                                            @error('designation_ne')
                                                <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="sort_order" class="small font-weight-bold text-dark">Sort Order</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                        </div>
                                        <input type="number"
                                            id="sort_order"
                                            name="sort_order"
                                            min="0"
                                            class="form-control @error('sort_order') is-invalid @enderror"
                                            value="{{ old('sort_order', $data->sort_order ?? 0) }}"
                                            placeholder="0">
                                    </div>
                                    @error('sort_order')
                                        <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="small font-weight-bold text-dark d-block">Publish Status</label>
                                    <div class="custom-control custom-switch custom-control-lg mt-2">
                                        <input type="checkbox"
                                            class="custom-control-input"
                                            id="is_active"
                                            name="is_active"
                                            value="1"
                                            {{ old('is_active', isset($data) ? $data->is_active : true) ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">
                                            Active Member
                                        </label>
                                        <p class="small text-muted mb-0">Toggle to make this leading team member visible on the website.</p>
                                    </div>
                                </div>

                                <div class="form-actions mt-5 border-top pt-4">
                                    <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                        <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                        <span class="text">{{ isset($data) ? 'Update Member' : 'Save Member' }}</span>
                                    </button>
                                    <a href="{{ route('leadingTeams.index') }}"
                                        class="btn btn-secondary btn-icon-split shadow-sm ml-2">
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
        function previewLeadingTeamImage(event) {
            const file = event.target.files[0];
            const previewImg = document.getElementById('previewImg');
            const placeholder = document.getElementById('imagePlaceholder');
            const fileName = event.target.value.split('\\').pop();

            event.target.nextElementSibling.innerText = fileName || 'Choose image...';

            if (!file) {
                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('d-none');

                if (placeholder) {
                    placeholder.classList.add('d-none');
                }
            };

            reader.readAsDataURL(file);
        }
    </script>
@endpush
