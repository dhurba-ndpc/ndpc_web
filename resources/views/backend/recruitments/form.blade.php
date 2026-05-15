@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">
                {{ isset($data) ? 'Edit Recruitment Result' : 'Create Recruitment Result' }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('recruitment-results.index') }}">Recruitment Results</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($data) ? 'Edit Recruitment Result' : 'Create Recruitment Result' }}
                    </li>
                </ol>
            </nav>
        </div>

        <a href="{{ route('recruitment-results.index') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    @php
        $selectedCandidates = old('selected_candidates', $data->selected_candidates ?? []);
        $waitingCandidates = old('waiting_candidates', $data->waiting_candidates ?? []);

        if (empty($selectedCandidates)) {
            $selectedCandidates = [['sn' => 1, 'name_en' => '', 'name_ne' => '']];
        }

        if (empty($waitingCandidates)) {
            $waitingCandidates = [['sn' => 1, 'name_en' => '', 'name_ne' => '']];
        }
    @endphp

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-user-check mr-2"></i>
                {{ isset($data) ? 'Update Recruitment Result Information' : 'Recruitment Result Information' }}
            </h6>
        </div>

        <form action="{{ isset($data) ? route('recruitment-results.update', $data->id) : route('recruitment-results.store') }}"
            method="POST">
            @csrf
            @if (isset($data))
                @method('PUT')
            @endif

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="card border-left-info shadow-sm h-100">
                            <div class="card-header bg-light">
                                <h6 class="m-0 font-weight-bold text-info">
                                    <i class="fas fa-heading mr-1"></i> Result Title
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_en" class="form-label">
                                        <i class="fas fa-language text-info"></i> English Title
                                    </label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                        id="title_en" name="title_en"
                                        value="{{ old('title_en', $data->title_en ?? '') }}"
                                        placeholder="Enter English recruitment result title">
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title_ne" class="form-label">
                                        <i class="fas fa-language text-info"></i> Nepali Title
                                    </label>
                                    <input type="text" class="form-control @error('title_ne') is-invalid @enderror"
                                        id="title_ne" name="title_ne"
                                        value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                        placeholder="Enter Nepali recruitment result title">
                                    @error('title_ne')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="custom-control custom-switch custom-control-lg mt-4">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                        value="1" {{ old('is_active', $data->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="is_active">
                                        Publish Status
                                    </label>
                                    <p class="small text-muted">Toggle to make this recruitment result visible on the website.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card border-left-success shadow-sm mb-4">
                            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">
                                    <i class="fas fa-check-circle mr-1"></i> Selected List
                                </h6>
                                <button type="button" class="btn btn-success btn-sm shadow-sm"
                                    onclick="addCandidateRow('selected')">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="selectedCandidateRows">
                                    @foreach ($selectedCandidates as $candidate)
                                        <div class="candidate-row border rounded bg-white p-3 mb-3">
                                            <div class="row align-items-end">
                                                <div class="col-md-2">
                                                    <div class="form-group mb-md-0">
                                                        <label class="small font-weight-bold text-dark">S.No</label>
                                                        <input type="number" min="1"
                                                            name="selected_candidates[{{ $loop->index }}][sn]"
                                                            class="form-control"
                                                            value="{{ $candidate['sn'] ?? $loop->iteration }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-md-0">
                                                        <label class="small font-weight-bold text-dark">Name English</label>
                                                        <input type="text"
                                                            name="selected_candidates[{{ $loop->index }}][name_en]"
                                                            class="form-control @error('selected_candidates.' . $loop->index . '.name_en') is-invalid @enderror"
                                                            value="{{ $candidate['name_en'] ?? '' }}"
                                                            placeholder="Candidate name in English">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-md-0">
                                                        <label class="small font-weight-bold text-dark">Name Nepali</label>
                                                        <input type="text"
                                                            name="selected_candidates[{{ $loop->index }}][name_ne]"
                                                            class="form-control"
                                                            value="{{ $candidate['name_ne'] ?? '' }}"
                                                            placeholder="Candidate name in Nepali">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 text-md-right mt-3 mt-md-0">
                                                    <button type="button" class="btn btn-danger btn-sm shadow-sm"
                                                        onclick="removeCandidateRow(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card border-left-warning shadow-sm">
                            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-warning">
                                    <i class="fas fa-clock mr-1"></i> Waiting List
                                </h6>
                                <button type="button" class="btn btn-warning btn-sm shadow-sm"
                                    onclick="addCandidateRow('waiting')">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="waitingCandidateRows">
                                    @foreach ($waitingCandidates as $candidate)
                                        <div class="candidate-row border rounded bg-white p-3 mb-3">
                                            <div class="row align-items-end">
                                                <div class="col-md-2">
                                                    <div class="form-group mb-md-0">
                                                        <label class="small font-weight-bold text-dark">S.No</label>
                                                        <input type="number" min="1"
                                                            name="waiting_candidates[{{ $loop->index }}][sn]"
                                                            class="form-control"
                                                            value="{{ $candidate['sn'] ?? $loop->iteration }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-md-0">
                                                        <label class="small font-weight-bold text-dark">Name English</label>
                                                        <input type="text"
                                                            name="waiting_candidates[{{ $loop->index }}][name_en]"
                                                            class="form-control @error('waiting_candidates.' . $loop->index . '.name_en') is-invalid @enderror"
                                                            value="{{ $candidate['name_en'] ?? '' }}"
                                                            placeholder="Candidate name in English">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-md-0">
                                                        <label class="small font-weight-bold text-dark">Name Nepali</label>
                                                        <input type="text"
                                                            name="waiting_candidates[{{ $loop->index }}][name_ne]"
                                                            class="form-control"
                                                            value="{{ $candidate['name_ne'] ?? '' }}"
                                                            placeholder="Candidate name in Nepali">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 text-md-right mt-3 mt-md-0">
                                                    <button type="button" class="btn btn-danger btn-sm shadow-sm"
                                                        onclick="removeCandidateRow(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-actions mt-4 border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">
                                    {{ isset($data) ? 'Update Recruitment Result' : 'Save Recruitment Result' }}
                                </span>
                            </button>
                            <a href="{{ route('recruitment-results.index') }}"
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
@endsection

@push('script')
    <script>
        let selectedIndex = {{ count($selectedCandidates) }};
        let waitingIndex = {{ count($waitingCandidates) }};

        function candidateRowTemplate(type, index) {
            const fieldName = type === 'selected' ? 'selected_candidates' : 'waiting_candidates';
            const serial = index + 1;

            return `
                <div class="candidate-row border rounded bg-white p-3 mb-3">
                    <div class="row align-items-end">
                        <div class="col-md-2">
                            <div class="form-group mb-md-0">
                                <label class="small font-weight-bold text-dark">S.No</label>
                                <input type="number" min="1" name="${fieldName}[${index}][sn]" class="form-control" value="${serial}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-md-0">
                                <label class="small font-weight-bold text-dark">Name English</label>
                                <input type="text" name="${fieldName}[${index}][name_en]" class="form-control" placeholder="Candidate name in English">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-md-0">
                                <label class="small font-weight-bold text-dark">Name Nepali</label>
                                <input type="text" name="${fieldName}[${index}][name_ne]" class="form-control" placeholder="Candidate name in Nepali">
                            </div>
                        </div>
                        <div class="col-md-2 text-md-right mt-3 mt-md-0">
                            <button type="button" class="btn btn-danger btn-sm shadow-sm" onclick="removeCandidateRow(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }

        function addCandidateRow(type) {
            if (type === 'selected') {
                document.getElementById('selectedCandidateRows').insertAdjacentHTML('beforeend', candidateRowTemplate(type, selectedIndex));
                selectedIndex++;
                return;
            }

            document.getElementById('waitingCandidateRows').insertAdjacentHTML('beforeend', candidateRowTemplate(type, waitingIndex));
            waitingIndex++;
        }

        function removeCandidateRow(button) {
            const rowsWrapper = button.closest('[id$="CandidateRows"]');
            const rows = rowsWrapper.querySelectorAll('.candidate-row');

            if (rows.length > 1) {
                button.closest('.candidate-row').remove();
            }
        }
    </script>
@endpush
