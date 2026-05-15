@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Vacancy' : 'Create Vacancy' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('vacancy.index') }}">Vacancies</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($data) ? 'Edit Vacancy' : 'Create Vacancy' }}
                    </li>
                </ol>
            </nav>
        </div>

        <a href="{{ route('vacancy.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-briefcase mr-2"></i>{{ isset($data) ? 'Update Vacancy Information' : 'Vacancy Information' }}
            </h6>
        </div>

        <form action="{{ isset($data) ? route('vacancy.update', $data->id) : route('vacancy.store') }}" method="POST">
            @csrf
            @if (isset($data))
                @method('PUT')
            @endif

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-left-info shadow-sm mb-4">
                            <div class="card-header bg-light">
                                <h6 class="m-0 font-weight-bold text-info">
                                    <i class="fas fa-info-circle mr-1"></i> Job Details
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slug" class="form-label">
                                        <i class="fas fa-link text-info"></i> Slug
                                    </label>
                                    <input readonly type="text" class="form-control @error('slug') is-invalid @enderror"
                                        id="slug" name="slug" value="{{ old('slug', $data->slug ?? '') }}"
                                        placeholder="Auto generated vacancy slug">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="location" class="form-label">
                                        <i class="fas fa-map-marker-alt text-info"></i> Location
                                    </label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        id="location" name="location" value="{{ old('location', $data->location ?? '') }}"
                                        placeholder="Enter job location">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="employment_type" class="form-label">
                                        <i class="fas fa-user-tie text-info"></i> Employment Type
                                    </label>
                                    <select class="form-control @error('employment_type') is-invalid @enderror"
                                        id="employment_type" name="employment_type">
                                        @foreach ([
                                            'full_time' => 'Full Time',
                                            'part_time' => 'Part Time',
                                            'remote' => 'Remote',
                                            'hybrid' => 'Hybrid',
                                            'contract' => 'Contract',
                                            'internship' => 'Internship',
                                        ] as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ old('employment_type', $data->employment_type ?? 'full_time') === $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('employment_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="salary" class="form-label">
                                        <i class="fas fa-money-bill-wave text-info"></i> Salary
                                    </label>
                                    <input type="text" class="form-control @error('salary') is-invalid @enderror"
                                        id="salary" name="salary" value="{{ old('salary', $data->salary ?? '') }}"
                                        placeholder="Enter salary range">
                                    @error('salary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="experience_level" class="form-label">
                                        <i class="fas fa-layer-group text-info"></i> Experience Level
                                    </label>
                                    <input type="text"
                                        class="form-control @error('experience_level') is-invalid @enderror"
                                        id="experience_level" name="experience_level"
                                        value="{{ old('experience_level', $data->experience_level ?? '') }}"
                                        placeholder="Enter required experience">
                                    @error('experience_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deadline" class="form-label">
                                        <i class="fas fa-calendar-alt text-info"></i> Deadline
                                    </label>
                                    <input type="date" class="form-control @error('deadline') is-invalid @enderror"
                                        id="deadline" name="deadline"
                                        value="{{ old('deadline', isset($data) && $data->deadline ? $data->deadline->format('Y-m-d') : '') }}">
                                    @error('deadline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="total_applicants" class="form-label">
                                        <i class="fas fa-users text-info"></i> Total Applicants
                                    </label>
                                    <input type="number" min="0"
                                        class="form-control @error('total_applicants') is-invalid @enderror"
                                        id="total_applicants" name="total_applicants"
                                        value="{{ old('total_applicants', $data->total_applicants ?? 0) }}">
                                    @error('total_applicants')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="custom-control custom-switch custom-control-lg mt-4">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                        value="1" {{ old('is_active', $data->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="is_active">
                                        Publish Status
                                    </label>
                                    <p class="small text-muted">Toggle to make this vacancy visible on the website.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <ul class="nav nav-tabs nav-fill mb-4" id="vacancyLanguageTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active {{ $errors->has('title_en') || $errors->has('short_description_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
                                    id="english-tab" data-toggle="tab" href="#english" role="tab"
                                    aria-controls="english" aria-selected="true">
                                    <i class="fas fa-language mr-1"></i> English
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $errors->has('title_ne') || $errors->has('short_description_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                    id="nepali-tab" data-toggle="tab" href="#nepali" role="tab"
                                    aria-controls="nepali" aria-selected="false">
                                    <i class="fas fa-language mr-1"></i> Nepali
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="vacancyLanguageTabsContent">
                            <div class="tab-pane fade show active" id="english" role="tabpanel"
                                aria-labelledby="english-tab">
                                <div class="card border-left-success shadow-sm">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="title_en" class="form-label">
                                                <i class="fas fa-heading text-success"></i> Vacancy Title
                                            </label>
                                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                                id="title_en" name="title_en"
                                                value="{{ old('title_en', $data->title_en ?? '') }}"
                                                placeholder="Enter English vacancy title">
                                            @error('title_en')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="short_description_en" class="form-label">
                                                <i class="fas fa-align-left text-success"></i> Short Description
                                            </label>
                                            <textarea class="form-control @error('short_description_en') is-invalid @enderror" id="short_description_en"
                                                name="short_description_en" rows="4" placeholder="Enter English short description">{{ old('short_description_en', $data->short_description_en ?? '') }}</textarea>
                                            @error('short_description_en')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0">
                                            <label for="description_en" class="form-label">
                                                <i class="fas fa-file-alt text-success"></i> Full Description
                                            </label>
                                            <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en"
                                                name="description_en" rows="8" placeholder="Enter English full description">{{ old('description_en', $data->description_en ?? '') }}</textarea>
                                            @error('description_en')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nepali" role="tabpanel" aria-labelledby="nepali-tab">
                                <div class="card border-left-warning shadow-sm">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="title_ne" class="form-label">
                                                <i class="fas fa-heading text-warning"></i> Vacancy Title
                                            </label>
                                            <input type="text" class="form-control @error('title_ne') is-invalid @enderror"
                                                id="title_ne" name="title_ne"
                                                value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                                placeholder="Enter Nepali vacancy title">
                                            @error('title_ne')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="short_description_ne" class="form-label">
                                                <i class="fas fa-align-left text-warning"></i> Short Description
                                            </label>
                                            <textarea class="form-control @error('short_description_ne') is-invalid @enderror" id="short_description_ne"
                                                name="short_description_ne" rows="4" placeholder="Enter Nepali short description">{{ old('short_description_ne', $data->short_description_ne ?? '') }}</textarea>
                                            @error('short_description_ne')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0">
                                            <label for="description_ne" class="form-label">
                                                <i class="fas fa-file-alt text-warning"></i> Full Description
                                            </label>
                                            <textarea class="form-control @error('description_ne') is-invalid @enderror" id="description_ne"
                                                name="description_ne" rows="8" placeholder="Enter Nepali full description">{{ old('description_ne', $data->description_ne ?? '') }}</textarea>
                                            @error('description_ne')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions mt-4 border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">{{ isset($data) ? 'Update Vacancy' : 'Save Vacancy' }}</span>
                            </button>
                            <a href="{{ route('vacancy.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                <span class="icon text-white-50"><i class="fas fa-times"></i></span>
                                <span class="text">Cancel</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
