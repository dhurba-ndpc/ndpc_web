@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">
                {{ isset($data) ? 'Edit Technology Solution Item' : 'Create Technology Solution Item' }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('technology-solution-items.index') }}">Technology Solution Items</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($data) ? 'Edit Item' : 'Create Item' }}
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('technology-solution-items.index') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-cubes mr-2"></i>Technology Solution Item Information
                    </h6>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($data) ? route('technology-solution-items.update', $data->id) : route('technology-solution-items.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($data))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="card border-left-primary shadow h-100">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-image"></i> Solution Image
                                        </h6>
                                    </div>
                                    <div class="card-body text-center">
                                        @php
                                            $hasImage = isset($data) && $data->image;
                                        @endphp

                                        <div class="border rounded p-2 bg-light d-flex align-items-center justify-content-center mb-3"
                                            style="min-height: 240px;">
                                            <img id="technologySolutionItemImagePreview"
                                                src="{{ $hasImage ? asset('storage/' . $data->image) : asset('backend/img/placeholder.jpg') }}"
                                                alt="Technology Solution Item Image Preview"
                                                class="img-fluid rounded shadow-sm"
                                                style="max-height: 220px; object-fit: cover; {{ $hasImage ? '' : 'opacity: 0.5;' }}">
                                        </div>

                                        <div class="custom-file text-left">
                                            <input type="file" name="image"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                id="image" accept="image/*"
                                                onchange="previewTechnologySolutionItemImage(event)">
                                            <label class="custom-file-label" for="image">Choose image...</label>
                                            @error('image')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <small class="text-muted mt-2 d-block">Recommended image size: 800x600px, JPG, PNG
                                            or WebP.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group mb-4">
                                    <label for="technology_solution_category_id" class="form-label">
                                        <i class="fas fa-layer-group text-info"></i> Category
                                    </label>
                                    <select
                                        class="form-control @error('technology_solution_category_id') is-invalid @enderror"
                                        id="technology_solution_category_id" name="technology_solution_category_id">
                                        <option value="">Select category</option>
                                        @isset($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('technology_solution_category_id', $data->technology_solution_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title_en ?? $category->title_ne }}
                                                </option>
                                            @endforeach
                                        @endisset
                                        @if (!isset($categories) && isset($data) && $data->category)
                                            <option value="{{ $data->technology_solution_category_id }}" selected>
                                                {{ $data->category->title_en ?? $data->category->title_ne }}
                                            </option>
                                        @endif
                                    </select>
                                    @error('technology_solution_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <fieldset id="formFields" disabled>
                                    <ul class="nav nav-tabs nav-fill mb-4" id="technologySolutionItemLanguageTabs"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active {{ $errors->has('title_en') || $errors->has('short_description_en') || $errors->has('use_case_title_en') || $errors->has('use_case_description_en') || $errors->has('glass_text_en') || $errors->has('stat_one_label_en') || $errors->has('stat_two_label_en') || $errors->has('stat_three_label_en') || $errors->has('stat_four_label_en') ? 'text-danger font-weight-bold' : '' }}"
                                                id="english-tab" data-toggle="tab" href="#english" role="tab"
                                                aria-controls="english" aria-selected="true">
                                                <i class="fas fa-language mr-1"></i> English
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ $errors->has('title_ne') || $errors->has('short_description_ne') || $errors->has('use_case_title_ne') || $errors->has('use_case_description_ne') || $errors->has('glass_text_ne') || $errors->has('stat_one_label_ne') || $errors->has('stat_two_label_ne') || $errors->has('stat_three_label_ne') || $errors->has('stat_four_label_ne') ? 'text-danger font-weight-bold' : '' }}"
                                                id="nepali-tab" data-toggle="tab" href="#nepali" role="tab"
                                                aria-controls="nepali" aria-selected="false">
                                                <i class="fas fa-language mr-1"></i> Nepali
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="technologySolutionItemLanguageTabsContent">
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
                                                            value="{{ old('title_en', $data->title_en ?? '') }}"
                                                            placeholder="Enter English title">
                                                        @error('title_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="short_description_en" class="form-label">
                                                            <i class="fas fa-align-left text-success"></i> Short
                                                            Description
                                                        </label>
                                                        <textarea class="form-control @error('short_description_en') is-invalid @enderror" id="short_description_en"
                                                            name="short_description_en" rows="3" placeholder="Enter English short description">{{ old('short_description_en', $data->short_description_en ?? '') }}</textarea>
                                                        @error('short_description_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="use_case_title_en" class="form-label">
                                                            <i class="fas fa-briefcase text-success"></i> Use Case Title
                                                        </label>
                                                        <input type="text"
                                                            class="form-control @error('use_case_title_en') is-invalid @enderror"
                                                            id="use_case_title_en" name="use_case_title_en"
                                                            value="{{ old('use_case_title_en', $data->use_case_title_en ?? 'USE CASE') }}"
                                                            placeholder="Enter English use case title">
                                                        @error('use_case_title_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="use_case_description_en" class="form-label">
                                                            <i class="fas fa-file-alt text-success"></i> Use Case
                                                            Description
                                                        </label>
                                                        <textarea class="form-control @error('use_case_description_en') is-invalid @enderror" id="use_case_description_en"
                                                            name="use_case_description_en" rows="5" placeholder="Enter English use case description">{{ old('use_case_description_en', $data->use_case_description_en ?? '') }}</textarea>
                                                        @error('use_case_description_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="glass_text_en" class="form-label">
                                                            <i class="fas fa-comment-alt text-success"></i> Glass Text
                                                        </label>
                                                        <input type="text"
                                                            class="form-control @error('glass_text_en') is-invalid @enderror"
                                                            id="glass_text_en" name="glass_text_en"
                                                            value="{{ old('glass_text_en', $data->glass_text_en ?? '') }}"
                                                            placeholder="Enter English glass overlay text">
                                                        @error('glass_text_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="row">
                                                        @foreach ([1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four'] as $number => $key)
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="stat_{{ $key }}_label_en"
                                                                        class="form-label">
                                                                        <i class="fas fa-chart-bar text-success"></i> Stat
                                                                        {{ $number }} Label
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control @error('stat_' . $key . '_label_en') is-invalid @enderror"
                                                                        id="stat_{{ $key }}_label_en"
                                                                        name="stat_{{ $key }}_label_en"
                                                                        value="{{ old('stat_' . $key . '_label_en', $data->{'stat_' . $key . '_label_en'} ?? '') }}"
                                                                        placeholder="Enter English stat label">
                                                                    @error('stat_' . $key . '_label_en')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endforeach
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
                                                            value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                                            placeholder="Enter Nepali title">
                                                        @error('title_ne')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="short_description_ne" class="form-label">
                                                            <i class="fas fa-align-left text-warning"></i> Short
                                                            Description
                                                        </label>
                                                        <textarea class="form-control @error('short_description_ne') is-invalid @enderror" id="short_description_ne"
                                                            name="short_description_ne" rows="3" placeholder="Enter Nepali short description">{{ old('short_description_ne', $data->short_description_ne ?? '') }}</textarea>
                                                        @error('short_description_ne')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="use_case_title_ne" class="form-label">
                                                            <i class="fas fa-briefcase text-warning"></i> Use Case Title
                                                        </label>
                                                        <input type="text"
                                                            class="form-control @error('use_case_title_ne') is-invalid @enderror"
                                                            id="use_case_title_ne" name="use_case_title_ne"
                                                            value="{{ old('use_case_title_ne', $data->use_case_title_ne ?? '') }}"
                                                            placeholder="Enter Nepali use case title">
                                                        @error('use_case_title_ne')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="use_case_description_ne" class="form-label">
                                                            <i class="fas fa-file-alt text-warning"></i> Use Case
                                                            Description
                                                        </label>
                                                        <textarea class="form-control @error('use_case_description_ne') is-invalid @enderror" id="use_case_description_ne"
                                                            name="use_case_description_ne" rows="5" placeholder="Enter Nepali use case description">{{ old('use_case_description_ne', $data->use_case_description_ne ?? '') }}</textarea>
                                                        @error('use_case_description_ne')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="glass_text_ne" class="form-label">
                                                            <i class="fas fa-comment-alt text-warning"></i> Glass Text
                                                        </label>
                                                        <input type="text"
                                                            class="form-control @error('glass_text_ne') is-invalid @enderror"
                                                            id="glass_text_ne" name="glass_text_ne"
                                                            value="{{ old('glass_text_ne', $data->glass_text_ne ?? '') }}"
                                                            placeholder="Enter Nepali glass overlay text">
                                                        @error('glass_text_ne')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="row">
                                                        @foreach ([1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four'] as $number => $key)
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-3">
                                                                    <label for="stat_{{ $key }}_label_ne"
                                                                        class="form-label">
                                                                        <i class="fas fa-chart-bar text-warning"></i> Stat
                                                                        {{ $number }} Label
                                                                    </label>
                                                                    <input type="text"
                                                                        class="form-control @error('stat_' . $key . '_label_ne') is-invalid @enderror"
                                                                        id="stat_{{ $key }}_label_ne"
                                                                        name="stat_{{ $key }}_label_ne"
                                                                        value="{{ old('stat_' . $key . '_label_ne', $data->{'stat_' . $key . '_label_ne'} ?? '') }}"
                                                                        placeholder="Enter Nepali stat label">
                                                                    @error('stat_' . $key . '_label_ne')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-left-info shadow-sm mt-4">
                                        <div class="card-header bg-light">
                                            <h6 class="m-0 font-weight-bold text-info">
                                                <i class="fas fa-chart-line mr-1"></i>Statistic Values
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ([1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four'] as $number => $key)
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-3">
                                                            <label for="stat_{{ $key }}_value"
                                                                class="form-label">
                                                                Stat {{ $number }} Value
                                                            </label>
                                                            <input type="text"
                                                                class="form-control @error('stat_' . $key . '_value') is-invalid @enderror"
                                                                id="stat_{{ $key }}_value"
                                                                name="stat_{{ $key }}_value"
                                                                value="{{ old('stat_' . $key . '_value', $data->{'stat_' . $key . '_value'} ?? '') }}"
                                                                placeholder="e.g., 95">
                                                            @error('stat_' . $key . '_value')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <div class="custom-control custom-switch custom-control-lg">
                                                    <input type="checkbox" class="custom-control-input" id="is_active"
                                                        name="is_active" value="1"
                                                        {{ old('is_active', $data->is_active ?? true) ? 'checked' : '' }}>
                                                    <label class="custom-control-label font-weight-bold" for="is_active">
                                                        Publish Status
                                                    </label>
                                                    <p class="small text-muted">Toggle to make this solution item visible
                                                        on
                                                        the website.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <hr>

                        <div class="form-actions" id="formFieldsButton">

                            <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>

                                <span class="text">
                                    {{ isset($data) ? 'Update Solution Item' : 'Save Solution Item' }}
                                </span>
                            </button>

                            <a href="{{ route('technology-solution-items.index') }}"
                                class="btn btn-secondary btn-icon-split shadow-sm ml-2">

                                <span class="icon text-white-50">
                                    <i class="fas fa-times"></i>
                                </span>

                                <span class="text">
                                    Cancel
                                </span>
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
        function previewTechnologySolutionItemImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('technologySolutionItemImagePreview');
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
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const categoryField = document.getElementById('technology_solution_category_id');
            const formFields = document.getElementById('formFields');
            const submitButton = document.getElementById('submitButton');

            function toggleFormFields() {

                const isSelected = categoryField.value !== '';

                formFields.disabled = !isSelected;
                submitButton.disabled = !isSelected;
            }

            categoryField.addEventListener('change', toggleFormFields);

            toggleFormFields();

        });
    </script>
@endpush
