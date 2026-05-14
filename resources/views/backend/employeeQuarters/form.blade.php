@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Employee Quarter' : 'Create Employee Quarter' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employee-quarters.index') }}">Employee Quarters</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($data) ? 'Edit Employee Quarter' : 'Create Employee Quarter' }}
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('employee-quarters.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-award mr-2"></i>Employee Quarter Information
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('employee-quarters.update', $data->id) : route('employee-quarters.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($data))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="card border-left-primary shadow h-100">
                                    <div class="card-header bg-light">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-user-circle"></i> Employee Image
                                        </h6>
                                    </div>
                                    <div class="card-body text-center">
                                        @php
                                            $hasImage = isset($data) && $data->image;
                                        @endphp

                                        <div class="border rounded p-2 bg-light d-flex align-items-center justify-content-center mb-3" style="min-height: 240px;">
                                            <img id="employeeQuarterImagePreview"
                                                src="{{ $hasImage ? asset('storage/' . $data->image) : asset('backend/img/placeholder.jpg') }}"
                                                alt="Employee Quarter Image Preview"
                                                class="img-fluid rounded shadow-sm"
                                                style="max-height: 220px; object-fit: cover; {{ $hasImage ? '' : 'opacity: 0.5;' }}">
                                        </div>

                                        <div class="custom-file text-left">
                                            <input type="file"
                                                name="image"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                id="image"
                                                accept="image/*"
                                                onchange="previewEmployeeQuarterImage(event)">
                                            <label class="custom-file-label" for="image">Choose image...</label>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <small class="text-muted mt-2 d-block">Recommended image size: 500x500px</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <ul class="nav nav-tabs nav-fill mb-4" id="employeeQuarterLanguageTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active {{ $errors->has('employee_quarter_title_en') || $errors->has('name_en') || $errors->has('designation_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
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
                                        <a class="nav-link {{ $errors->has('employee_quarter_title_ne') || $errors->has('name_ne') || $errors->has('designation_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
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

                                <div class="tab-content" id="employeeQuarterLanguageTabsContent">
                                    <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
                                        <div class="card border-left-success">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="employee_quarter_title_en" class="form-label">
                                                        <i class="fas fa-heading text-success"></i> Employee Quarter Title
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('employee_quarter_title_en') is-invalid @enderror"
                                                        id="employee_quarter_title_en"
                                                        name="employee_quarter_title_en"
                                                        value="{{ old('employee_quarter_title_en', $data->employee_quarter_title_en ?? '') }}"
                                                        placeholder="Enter English employee quarter title">
                                                    @error('employee_quarter_title_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="name_en" class="form-label">
                                                        <i class="fas fa-user text-success"></i> Name
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('name_en') is-invalid @enderror"
                                                        id="name_en"
                                                        name="name_en"
                                                        value="{{ old('name_en', $data->name_en ?? '') }}"
                                                        placeholder="Enter English name">
                                                    @error('name_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="designation_en" class="form-label">
                                                        <i class="fas fa-briefcase text-success"></i> Designation
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('designation_en') is-invalid @enderror"
                                                        id="designation_en"
                                                        name="designation_en"
                                                        value="{{ old('designation_en', $data->designation_en ?? '') }}"
                                                        placeholder="Enter English designation">
                                                    @error('designation_en')
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
                                                    <label for="employee_quarter_title_ne" class="form-label">
                                                        <i class="fas fa-heading text-warning"></i> Employee Quarter Title
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('employee_quarter_title_ne') is-invalid @enderror"
                                                        id="employee_quarter_title_ne"
                                                        name="employee_quarter_title_ne"
                                                        value="{{ old('employee_quarter_title_ne', $data->employee_quarter_title_ne ?? '') }}"
                                                        placeholder="Enter Nepali employee quarter title">
                                                    @error('employee_quarter_title_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="name_ne" class="form-label">
                                                        <i class="fas fa-user text-warning"></i> Name
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('name_ne') is-invalid @enderror"
                                                        id="name_ne"
                                                        name="name_ne"
                                                        value="{{ old('name_ne', $data->name_ne ?? '') }}"
                                                        placeholder="Enter Nepali name">
                                                    @error('name_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="designation_ne" class="form-label">
                                                        <i class="fas fa-briefcase text-warning"></i> Designation
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('designation_ne') is-invalid @enderror"
                                                        id="designation_ne"
                                                        name="designation_ne"
                                                        value="{{ old('designation_ne', $data->designation_ne ?? '') }}"
                                                        placeholder="Enter Nepali designation">
                                                    @error('designation_ne')
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
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="quarter" class="form-label">
                                                <i class="fas fa-calendar-alt text-info"></i> Quarter
                                            </label>
                                            <select class="form-control @error('quarter') is-invalid @enderror" id="quarter" name="quarter">
                                                <option value="">Select quarter</option>
                                                @foreach (['1' => 'Quarter 1', '2' => 'Quarter 2', '3' => 'Quarter 3', '4' => 'Quarter 4'] as $value => $label)
                                                    <option value="{{ $value }}" {{ old('quarter', $data->quarter ?? '') == $value ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('quarter')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="year" class="form-label">
                                                <i class="fas fa-calendar text-info"></i> Year
                                            </label>
                                            <input type="text"
                                                class="form-control @error('year') is-invalid @enderror"
                                                id="year"
                                                name="year"
                                                value="{{ old('year', $data->year ?? '') }}"
                                                placeholder="e.g., 2082/83">
                                            @error('year')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
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
                                                <p class="small text-muted">Toggle to make this employee quarter visible on the website.</p>
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
                                <span class="text">{{ isset($data) ? 'Update Employee Quarter' : 'Save Employee Quarter' }}</span>
                            </button>
                            <a href="{{ route('employee-quarters.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
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
        function previewEmployeeQuarterImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('employeeQuarterImagePreview');
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
@endpush
