@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Report' : 'Create Report' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Reports</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($data) ? 'Edit Report' : 'Create Report' }}
                    </li>
                </ol>
            </nav>
        </div>

        <a href="{{ route('report.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-chart-bar mr-2"></i>{{ isset($data) ? 'Update Report Information' : 'Report Information' }}
            </h6>
        </div>

        <form action="{{ isset($data) ? route('report.update', $data->id) : route('report.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($data))
                @method('PUT')
            @endif

            <input type="hidden" name="type" value="report">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-left-info shadow-sm h-100">
                            <div class="card-header bg-light">
                                <h6 class="m-0 font-weight-bold text-info">
                                    <i class="fas fa-file-upload mr-1"></i> Report File
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="border rounded bg-light d-flex align-items-center justify-content-center mb-3"
                                    style="min-height: 190px;">
                                    <div class="text-center text-muted px-3">
                                        <i class="fas fa-file-pdf fa-4x mb-3 text-info"></i>
                                        <div class="font-weight-bold text-dark" id="reportFileName">
                                            {{ isset($data) && $data->file ? basename($data->file) : 'Upload report document' }}
                                        </div>
                                        <div class="small mt-1">PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX</div>
                                    </div>
                                </div>

                                @if (isset($data) && $data->file)
                                    <a href="{{ asset('storage/' . $data->file) }}" target="_blank"
                                        class="btn btn-outline-info btn-sm btn-block mb-3">
                                        <i class="fas fa-eye mr-1"></i> View Current File
                                    </a>
                                @endif

                                <div class="custom-file">
                                    <input type="file" id="file" name="file"
                                        class="custom-file-input @error('file') is-invalid @enderror"
                                        accept=".pdf,.doc,.docx,.xlsx,.xls,.ppt,.pptx" onchange="previewReportFile(event)">
                                    <label class="custom-file-label" for="file">Choose file...</label>
                                </div>
                                @error('file')
                                    <span class="text-danger small d-block mt-2"><strong>{{ $message }}</strong></span>
                                @enderror

                                <small class="text-muted d-block mt-2">Maximum file size: 20MB.</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <ul class="nav nav-tabs nav-fill mb-4" id="reportLanguageTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active {{ $errors->has('title_en') || $errors->has('badge_title_en') ? 'text-danger font-weight-bold' : '' }}"
                                    id="english-tab" data-toggle="tab" href="#english" role="tab"
                                    aria-controls="english" aria-selected="true">
                                    <i class="fas fa-language mr-1"></i> English
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $errors->has('title_ne') || $errors->has('badge_title_ne') ? 'text-danger font-weight-bold' : '' }}"
                                    id="nepali-tab" data-toggle="tab" href="#nepali" role="tab"
                                    aria-controls="nepali" aria-selected="false">
                                    <i class="fas fa-language mr-1"></i> Nepali
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="reportLanguageTabsContent">
                            <div class="tab-pane fade show active" id="english" role="tabpanel"
                                aria-labelledby="english-tab">
                                <div class="card border-left-success shadow-sm">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="title_en" class="form-label">
                                                <i class="fas fa-heading text-success"></i> Report Title
                                            </label>
                                            <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                                id="title_en" name="title_en"
                                                value="{{ old('title_en', $data->title_en ?? '') }}"
                                                placeholder="Enter English report title">
                                            @error('title_en')
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
                                                <i class="fas fa-heading text-warning"></i> Report Title
                                            </label>
                                            <input type="text" class="form-control @error('title_ne') is-invalid @enderror"
                                                id="title_ne" name="title_ne"
                                                value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                                placeholder="Enter Nepali report title">
                                            @error('title_ne')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom-control custom-switch custom-control-lg mt-4">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                value="1" {{ old('is_active', $data->is_active ?? true) ? 'checked' : '' }}>
                            <label class="custom-control-label font-weight-bold" for="is_active">Publish Status</label>
                            <p class="small text-muted">Toggle to make this report visible on the website.</p>
                        </div>

                        <div class="form-actions mt-4 border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">{{ isset($data) ? 'Update Report' : 'Save Report' }}</span>
                            </button>
                            <a href="{{ route('report.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
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

@push('script')
    <script>
        function previewReportFile(event) {
            const fileName = event.target.value.split('\\').pop();
            event.target.nextElementSibling.innerText = fileName || 'Choose file...';
            document.getElementById('reportFileName').innerText = fileName || 'Upload report document';
        }
    </script>
@endpush
