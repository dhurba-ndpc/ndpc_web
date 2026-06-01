@extends('frontend.layout.main')
@section('content')
    @php
        $successModalId = session('success_modal_id');
        $activeModalId = session('modal_id', $successModalId);
        $activeErrorBag = session('error_bag');
        $successTitle = session('success_title', 'Application submitted successfully');
        $successMessage = session(
            'success_message',
            'Your application has been sent to our administration team for review.',
        );
    @endphp

 @include('frontend.partials.menu_head_banner', ['menu' => $menu])
    <section id="job_vacancy_section_wrapper">
        <div class="container">
            @forelse ($vacancies as $key => $vacancy)
                @php
                    $validationBag = 'vacancy_' . $vacancy->id;
                    $formErrors = $errors->getBag($validationBag);
                    $isActiveForm = $activeErrorBag === $validationBag;
                    $isSuccessForm = (string) $successModalId === (string) $vacancy->id;
                @endphp

                <div class="job-vacancy-card p-4">
                    <div class="d-flex justify-content-between align-items-start align-items-center mb-3">
                        <h2 class="job-title h4 mb-0">{{ $vacancy->{'title_' . app()->getLocale()} ?: $vacancy->title_en }}
                        </h2>
                        <small class="posted-date">Expire on: {{ $vacancy->deadline?->diffForHumans() }}</small>
                    </div>

                    <div class="job-tags mb-4">
                        <span class="badge_custom-badge">{{ $vacancy->location ?? '' }}</span>
                        <span
                            class="badge_custom-badge mx-2">{{ Str::of($vacancy->employment_type)->replace('_', ' ')->title() }}</span>

                    </div>

                    <div class="job-description">
                        <div class="description-text mb-2">
                            {{ $vacancy->{'short_description_' . app()->getLocale()} ?: $vacancy->short_description_en }}
                        </div>
                        @if (empty($vacancy->external_link))
                            <a href="{{ route('job-detail', $vacancy->slug) }}"
                                class="read-more-btn">{{ app()->getLocale() == 'ne' ? 'थप पढ्नुहोस्' : 'Read More' }}</a>
                        @endif
                    </div>

                    <div class="mt-4">
                        @if (!empty($vacancy->external_link))
                            <a href="{{ $vacancy->external_link }}" target="_blank"
                                class="btn btn-apply px-4 py-2">{{ app()->getLocale() == 'ne' ? 'आवेदन दिनुहोस्' : 'Apply' }}</a>
                        @else
                            <button class="btn btn-apply px-4 py-2" data-bs-toggle="modal"
                                data-bs-target="#vacancyModal_{{ $vacancy->id }}">{{ app()->getLocale() == 'ne' ? 'आवेदन दिनुहोस्' : 'Apply' }}</button>
                        @endif
                    </div>
                </div>
                <!-- Existing Vacancy Modal -->
                <div class="modal fade vacancy_modal" id="vacancyModal_{{ $vacancy->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content vacancy-modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header vacancy-modal-header">
                                <div style="width: 100%;">
                                    <h2 class="modal-title vacancy-modal-title" id="exampleModalLabel">Apply for
                                        {{ $vacancy->{'title_' . app()->getLocale()} ?: $vacancy->title_en }}</h2>
                                    <p class="vacancy-modal-subtitle">Join our team and make an impact</p>
                                </div>
                                <button type="button" class="btn-close btn-close-white vacancy-modal-close-btn"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body vacancy-modal-body">
                                @if ($isSuccessForm)
                                    <div class="text-center py-4" role="status">
                                        <div class="mb-3" style="color: #198754;">
                                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" aria-hidden="true">
                                                <path d="M20 6 9 17l-5-5"></path>
                                            </svg>
                                        </div>
                                        <h5 class="mb-2" style="color: var(--dark);">{{ $successTitle }}</h5>
                                        <p class="mb-0" style="color: var(--text-mid);">{{ $successMessage }}</p>
                                    </div>
                                @else
                                    <form method="POST" action="{{ route('job-seeker-apply.store') }}"
                                        id="vacancyApplicationForm_{{ $vacancy->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="modal_id" value="{{ $vacancy->id }}">
                                        <input type="hidden" name="validation_bag" value="{{ $validationBag }}">
                                        <input type="hidden" name="application_type" value="open_application">
                                        <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                                        <!-- Full Name Field -->
                                        <div class="vacancy-form-group">
                                            <label for="vacancy{{ $key }}FullName" class="vacancy-form-label">Full
                                                Name <span class="required-asterisk">*</span></label>
                                            <input type="text" name="full_name"
                                                class="form-control vacancy-form-input {{ $formErrors->has('full_name') ? 'is-invalid' : '' }}"
                                                id="vacancy{{ $key }}FullName" placeholder="Enter your full name"
                                                value="{{ $isActiveForm ? old('full_name') : '' }}">
                                            @if ($formErrors->has('full_name'))
                                                <div class="invalid-feedback">{{ $formErrors->first('full_name') }}</div>
                                            @endif
                                        </div>

                                        <!-- Email Field -->
                                        <div class="vacancy-form-group">
                                            <label for="vacancy{{ $key }}Email" class="vacancy-form-label">Email
                                                Address <span class="required-asterisk">*</span></label>
                                            <input type="email" name="email"
                                                class="form-control vacancy-form-input {{ $formErrors->has('email') ? 'is-invalid' : '' }}"
                                                id="vacancy{{ $key }}Email" placeholder="your.email@example.com"
                                                value="{{ $isActiveForm ? old('email') : '' }}">
                                            @if ($formErrors->has('email'))
                                                <div class="invalid-feedback">{{ $formErrors->first('email') }}</div>
                                            @endif
                                        </div>

                                        <!-- Phone Field -->
                                        <div class="vacancy-form-group">
                                            <label for="vacancy{{ $key }}Phone" class="vacancy-form-label">Phone
                                                Number <span class="required-asterisk">*</span></label>
                                            <input type="tel" name="phone_number"
                                                class="form-control vacancy-form-input {{ $formErrors->has('phone_number') ? 'is-invalid' : '' }}"
                                                id="vacancy{{ $key }}Phone" placeholder="+977-XXXXXXXXXX"
                                                value="{{ $isActiveForm ? old('phone_number') : '' }}">
                                            @if ($formErrors->has('phone_number'))
                                                <div class="invalid-feedback">{{ $formErrors->first('phone_number') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Resume Upload Field -->
                                        <div class="vacancy-form-group">
                                            <label for="vacancy{{ $key }}Resume"
                                                class="vacancy-form-label">Upload
                                                Your Resume <span class="required-asterisk">*</span></label>
                                            <div class="vacancy-drop-zone"
                                                id="vacancyResumeDropZone_{{ $key }}">
                                                <input type="file" name="file"
                                                    class="form-control {{ $formErrors->has('file') ? 'is-invalid' : '' }}"
                                                    id="vacancy{{ $key }}Resume" accept=".pdf,.doc,.docx"
                                                    style="display: none;">
                                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                                    stroke="var(--dark)" stroke-width="2" class="vacancy-drop-zone-icon">
                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                    <polyline points="17 8 12 3 7 8"></polyline>
                                                    <line x1="12" y1="3" x2="12" y2="15">
                                                    </line>
                                                </svg>
                                                <p class="vacancy-drop-zone-text">Click to upload or drag and drop</p>
                                                <p class="vacancy-drop-zone-subtext">PDF, DOC, or DOCX (Max 5MB)</p>
                                            </div>
                                            @if ($formErrors->has('file'))
                                                <div class="invalid-feedback d-block">{{ $formErrors->first('file') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Cover Letter / Additional Info -->
                                        <div class="vacancy-form-group">
                                            <label for="vacancy{{ $key }}Message" class="vacancy-form-label">Why
                                                Should We Hire You?
                                                (Optional)
                                            </label>
                                            <textarea name="why_hire_you"
                                                class="form-control vacancy-form-textarea {{ $formErrors->has('why_hire_you') ? 'is-invalid' : '' }}"
                                                id="vacancy{{ $key }}Message" rows="4"
                                                placeholder="Share your experience and why you're a great fit for this position...">{{ $isActiveForm ? old('why_hire_you') : '' }}</textarea>
                                            @if ($formErrors->has('why_hire_you'))
                                                <div class="invalid-feedback">{{ $formErrors->first('why_hire_you') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Terms Checkbox -->
                                        <div class="vacancy-form-group">
                                            <div class="vacancy-form-check">
                                                <input class="form-check-input vacancy-form-check-input" type="checkbox"
                                                    name="is_agreed" id="vacancy{{ $key }}Terms" value="1"
                                                    {{ $isActiveForm && old('is_agreed') ? 'checked' : '' }}>
                                                <label class="vacancy-form-check-label"
                                                    for="vacancy{{ $key }}Terms">
                                                    I agree that my information will be reviewed by the hiring team
                                                </label>
                                            </div>
                                            @if ($formErrors->has('is_agreed'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $formErrors->first('is_agreed') }}</div>
                                            @endif
                                        </div>
                                    </form>
                                @endif
                            </div>

                            <!-- Modal Footer -->
                            <div class="vacancy-modal-footer">
                                <button type="button" class="btn vacancy-modal-btn-cancel"
                                    data-bs-dismiss="modal">{{ $isSuccessForm ? 'Close' : 'Cancel' }}</button>
                                @unless ($isSuccessForm)
                                    <button type="submit" form="vacancyApplicationForm_{{ $vacancy->id }}"
                                        class="btn btn-apply vacancy-modal-btn-submit">
                                        <span>Send Application</span>
                                    </button>
                                @endunless
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No Any Vacancy</p>
            @endforelse

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="free_apply_postion_wrapper">
                        <div class="text-center py-5">
                            <h3 style="color: var(--dark); margin-bottom: 20px; font-size: 1.8rem; font-weight:700;">Want
                                to
                                Apply?</h3>
                            <p style="color: var(--text-mid); margin-bottom: 30px; font-size: 1rem;">
                                Submit your general application and we'll match you with opportunities that fit your profile
                            </p>
                            <button class="btn btn-apply px-5 py-2" data-bs-toggle="modal"
                                data-bs-target="#generalApplicationModal">
                                Submit Your Application
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Script to Handle Vacancy Modal Form -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.vacancy-drop-zone').forEach(function(dropZone) {
                const fileInput = dropZone.querySelector('input[type="file"]');

                if (!fileInput) {
                    return;
                }

                dropZone.addEventListener('click', function() {
                    fileInput.click();
                });

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(function(eventName) {
                    dropZone.addEventListener(eventName, function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    }, false);
                });

                ['dragenter', 'dragover'].forEach(function(eventName) {
                    dropZone.addEventListener(eventName, function() {
                        dropZone.style.borderColor = 'var(--dark)';
                        dropZone.style.backgroundColor = 'rgba(25, 57, 128, 0.05)';
                    }, false);
                });

                ['dragleave', 'drop'].forEach(function(eventName) {
                    dropZone.addEventListener(eventName, function() {
                        dropZone.style.borderColor = 'var(--border)';
                        dropZone.style.backgroundColor = 'transparent';
                    }, false);
                });

                dropZone.addEventListener('drop', function(e) {
                    fileInput.files = e.dataTransfer.files;
                    showSelectedFile(dropZone, fileInput.files);
                }, false);

                fileInput.addEventListener('change', function() {
                    showSelectedFile(dropZone, fileInput.files);
                });
            });

            function showSelectedFile(dropZone, files) {
                if (files.length > 0) {
                    const label = dropZone.querySelector('.vacancy-drop-zone-text');

                    if (label) {
                        label.textContent = files[0].name + ' selected';
                        label.style.color = 'var(--dark)';
                        label.style.fontWeight = '600';
                    }
                }
            }
        });
    </script>

    @php
        $generalValidationBag = 'general_application';
        $generalErrors = $errors->getBag($generalValidationBag);
        $isGeneralActiveForm = $activeErrorBag === $generalValidationBag;
        $isGeneralSuccessForm = $successModalId === 'generalApplicationModal';
    @endphp

    <!-- General Application Modal - Auto-trigger on Page Visit -->
    <div class="modal fade vacancy_modal" id="generalApplicationModal" tabindex="-1"
        aria-labelledby="generalApplicationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content vacancy-modal-content">
                <!-- Modal Header -->
                <div class="modal-header vacancy-modal-header">
                    <div style="width: 100%;">
                        <h2 class="modal-title vacancy-modal-title" id="generalApplicationLabel">Join Our Team</h2>
                        <p class="vacancy-modal-subtitle">Explore exciting career opportunities with us</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white vacancy-modal-close-btn"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body vacancy-modal-body">
                    @if ($isGeneralSuccessForm)
                        <div class="text-center py-4" role="status">
                            <div class="mb-3" style="color: #198754;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                            </div>
                            <h5 class="mb-2" style="color: var(--dark);">{{ $successTitle }}</h5>
                            <p class="mb-0" style="color: var(--text-mid);">{{ $successMessage }}</p>
                        </div>
                    @else
                        <div class="vacancy-info-box">
                            <p>
                                <strong>Welcome!</strong> We're always looking for talented professionals to join our
                                growing
                                team. Submit your general application below, and we'll keep your profile on file. Whenever a
                                position matches your skills and experience, we'll reach out to you directly.
                            </p>
                        </div>

                        <form method="POST" action="{{ route('job-seeker-apply.store') }}" id="generalApplicationForm"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="modal_id" value="generalApplicationModal">
                            <input type="hidden" name="validation_bag" value="{{ $generalValidationBag }}">
                            <input type="hidden" name="application_type" value="free_vacancy_application">
                            <!-- Full Name Field -->
                            <div class="vacancy-form-group">
                                <label for="generalFullName" class="vacancy-form-label">Full Name <span
                                        class="required-asterisk">*</span></label>
                                <input type="text" name="full_name"
                                    class="form-control vacancy-form-input {{ $generalErrors->has('full_name') ? 'is-invalid' : '' }}"
                                    id="generalFullName" placeholder="Enter your full name"
                                    value="{{ $isGeneralActiveForm ? old('full_name') : '' }}">
                                @if ($generalErrors->has('full_name'))
                                    <div class="invalid-feedback">{{ $generalErrors->first('full_name') }}</div>
                                @endif
                            </div>

                            <!-- Email Field -->
                            <div class="vacancy-form-group">
                                <label for="generalEmail" class="vacancy-form-label">Email Address <span
                                        class="required-asterisk">*</span></label>
                                <input type="email" name="email"
                                    class="form-control vacancy-form-input {{ $generalErrors->has('email') ? 'is-invalid' : '' }}"
                                    id="generalEmail" placeholder="your.email@example.com"
                                    value="{{ $isGeneralActiveForm ? old('email') : '' }}">
                                @if ($generalErrors->has('email'))
                                    <div class="invalid-feedback">{{ $generalErrors->first('email') }}</div>
                                @endif
                            </div>

                            <!-- Phone Field -->
                            <div class="vacancy-form-group">
                                <label for="generalPhone" class="vacancy-form-label">Phone Number <span
                                        class="required-asterisk">*</span></label>
                                <input type="tel" name="phone_number"
                                    class="form-control vacancy-form-input {{ $generalErrors->has('phone_number') ? 'is-invalid' : '' }}"
                                    id="generalPhone" placeholder="+977-XXXXXXXXXX"
                                    value="{{ $isGeneralActiveForm ? old('phone_number') : '' }}">
                                @if ($generalErrors->has('phone_number'))
                                    <div class="invalid-feedback">{{ $generalErrors->first('phone_number') }}</div>
                                @endif
                            </div>

                            <!-- Position Interest Field -->
                            <div class="vacancy-form-group">
                                <label for="generalPosition" class="vacancy-form-label">Position of Interest <span
                                        class="required-asterisk">*</span></label>
                                <select name="interested_position"
                                    class="form-control vacancy-form-input {{ $generalErrors->has('interested_position') ? 'is-invalid' : '' }}"
                                    id="generalPosition">
                                    <option value="">-- Select a position --</option>
                                    <option value="MIS Officer"
                                        {{ $isGeneralActiveForm && old('interested_position') === 'MIS Officer' ? 'selected' : '' }}>
                                        MIS Officer</option>
                                    <option value="Laravel Developer"
                                        {{ $isGeneralActiveForm && old('interested_position') === 'Laravel Developer' ? 'selected' : '' }}>
                                        Laravel Developer</option>
                                    <option value="Other"
                                        {{ $isGeneralActiveForm && old('interested_position') === 'Other' ? 'selected' : '' }}>
                                        Other Position</option>
                                </select>
                                @if ($generalErrors->has('interested_position'))
                                    <div class="invalid-feedback">{{ $generalErrors->first('interested_position') }}</div>
                                @endif
                            </div>

                            <!-- Resume Upload Field -->
                            <div class="vacancy-form-group">
                                <label for="generalResume" class="vacancy-form-label">Upload Your Resume <span
                                        class="required-asterisk">*</span></label>
                                <div class="vacancy-drop-zone" id="resumeDropZone">
                                    <input type="file" name="file"
                                        class="form-control {{ $generalErrors->has('file') ? 'is-invalid' : '' }}"
                                        id="generalResume" accept=".pdf,.doc,.docx" style="display: none;">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                        stroke="var(--dark)" stroke-width="2" class="vacancy-drop-zone-icon">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <p class="vacancy-drop-zone-text">Click to upload or drag and drop</p>
                                    <p class="vacancy-drop-zone-subtext">PDF, DOC, or DOCX (Max 5MB)</p>
                                </div>
                                @if ($generalErrors->has('file'))
                                    <div class="invalid-feedback d-block">{{ $generalErrors->first('file') }}</div>
                                @endif
                            </div>

                            <!-- Cover Letter / Additional Info -->
                            <div class="vacancy-form-group">
                                <label for="generalMessage" class="vacancy-form-label">Tell Us About Yourself
                                    (Optional)</label>
                                <textarea name="why_hire_you"
                                    class="form-control vacancy-form-textarea {{ $generalErrors->has('why_hire_you') ? 'is-invalid' : '' }}"
                                    id="generalMessage" rows="4"
                                    placeholder="Share your career goals, skills, and what makes you a great fit for our team...">{{ $isGeneralActiveForm ? old('why_hire_you') : '' }}</textarea>
                                @if ($generalErrors->has('why_hire_you'))
                                    <div class="invalid-feedback">{{ $generalErrors->first('why_hire_you') }}</div>
                                @endif
                            </div>

                            <!-- Terms Checkbox -->
                            <div class="vacancy-form-group">
                                <div class="vacancy-form-check">
                                    <input class="form-check-input vacancy-form-check-input" type="checkbox"
                                        name="is_agreed" id="generalTerms" value="1"
                                        {{ $isGeneralActiveForm && old('is_agreed') ? 'checked' : '' }}>
                                    <label class="vacancy-form-check-label" for="generalTerms">
                                        I agree to be contacted about job opportunities and company updates
                                    </label>

                                </div>
                                @if ($generalErrors->has('is_agreed'))
                                    <div class="invalid-feedback d-block">{{ $generalErrors->first('is_agreed') }}</div>
                                @endif
                            </div>
                        </form>
                    @endif
                </div>

                <!-- Modal Footer -->
                <div class="vacancy-modal-footer">
                    <button type="button" class="btn vacancy-modal-btn-cancel"
                        data-bs-dismiss="modal">{{ $isGeneralSuccessForm ? 'Close' : 'Cancel' }}</button>
                    @unless ($isGeneralSuccessForm)
                        <button type="submit" form="generalApplicationForm" class="btn btn-apply vacancy-modal-btn-submit">
                            <span id="submitButtonText">Submit Application</span>
                        </button>
                    @endunless
                </div>
            </div>
        </div>
    </div>


    @if ($activeModalId)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const targetModalId = @json($activeModalId === 'generalApplicationModal' ? 'generalApplicationModal' : 'vacancyModal_' . $activeModalId);
                const targetModal = document.getElementById(targetModalId);

                if (targetModal) {
                    const modal = new bootstrap.Modal(targetModal);
                    modal.show();
                }
            });
        </script>
    @endif
@endsection
