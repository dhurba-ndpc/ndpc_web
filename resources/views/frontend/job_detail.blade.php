@extends('frontend.layout.main')
@section('content')
    @php
        $validationBag = 'vacancy_' . $jobdetail->id;
        $successModalId = session('success_modal_id');
        $activeModalId = session('modal_id', $successModalId);
        $activeErrorBag = session('error_bag');
        $formErrors = $errors->getBag($validationBag);
        $isActiveForm = $activeErrorBag === $validationBag;
        $isSuccessForm = (string) $successModalId === (string) $jobdetail->id;
        $successTitle = session('success_title', 'Application submitted successfully');
        $successMessage = session('success_message', 'Your application has been sent to our administration team for review.');
    @endphp
    <section class="page_top_banner" style="background-image:url('{{ asset('storage/' . $menu->image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1> {{ $menu->{'page_title_' . app()->getLocale()} ?: $menu->page_title_en }} {{ app()->getLocale() == 'ne' ? '-विस्तृत विवरण' : '-Detail' }}</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                {!! $menu->{'description_' . app()->getLocale()} ?: $menu->description_en !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="job_description_container_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="job_description_wrap">
                        <div class="jd-card">

                            <!-- ── Header ── -->
                            <div class="jd-header">
                                <div class="jd-company-row">
                                    <!-- Logo -->
                                    <div class="d-flex align-items-center gap-3" style="flex:1">
                                        <div class="jd-logo-wrap">
                                            <!-- NDPC-style icon (inline SVG) -->
                                            <img src="{{ asset('frontend/images/logo_white.png') }}" alt="">
                                        </div>

                                        <div class="jd-company-info">
                                            <div class="jd-company-name">
                                                NDPC
                                                <i class="bi bi-patch-check-fill verified-icon"></i>
                                            </div>
                                            <h1 class="jd-title">{{ $jobdetail->{'title_' . app()->getLocale()} ?: $jobdetail->title_en }}</h1>
                                        </div>
                                    </div>
 
                                </div>

                                <!-- Meta row -->
                                <div class="jd-meta-row">
                                    <div class="jd-meta-item">
                                        <i class="bi bi-briefcase"></i>
                                       {{ Str::of($jobdetail->employment_type)->replace('_', ' ')->title() }}
                                    </div>
                                    <div class="jd-meta-sep"></div>
                                    <div class="jd-meta-item">
                                        <i class="bi bi-geo-alt"></i>
                                        {{$jobdetail->location ?? ''}}
                                    </div>
                                    <div class="jd-meta-sep"></div>
                                    <div class="jd-meta-item">
                                        <i class="bi bi-currency-rupee"></i>
                                          {{$jobdetail->salary ?? ''}}
                                    </div>
                                </div>

                                <!-- Tagline -->
                                <div class="jd-tagline">
                                    {{ $jobdetail->{'short_description_' . app()->getLocale()} ?: $jobdetail->short_description_en }}
                                </div>

                                <!-- CTA Buttons -->
                                <div class="jd-cta-row">
                                    <button class="btn-apply" data-bs-toggle="modal" data-bs-target="#vacancyModal_{{ $jobdetail->id }}">
                                        <i class="bi bi-lightning-charge-fill"></i>
                                        Apply
                                    </button>
                                    
                                </div>
                            </div>

                            <!-- ── Stats ── -->
                            <div class="jd-stats">
                                <div class="jd-stat-cell">
                                    <div class="jd-stat-icon">
                                        <i class="bi bi-briefcase-fill"></i>
                                    </div>
                                    <div class="jd-stat-label">Experience Level</div>
                                    <div class="jd-stat-value">{{$jobdetail->experience_level ?? ''}}</div>
                                </div>
                                <div class="jd-stat-cell">
                                    <div class="jd-stat-icon">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div class="jd-stat-label">Total Applicants</div>
                                    <div class="jd-stat-value">{{$jobdetail->total_applicants ?? ''}}</div>
                                </div>
                                <div class="jd-stat-cell">
                                    <div class="jd-stat-icon">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                    <div class="jd-stat-label">Posted</div>
                                    <div class="jd-stat-value">{{$jobdetail->created_at?->diffForHumans() ?? ''}}</div>
                                </div>
                                <div class="jd-stat-cell">
                                    <div class="jd-stat-icon">
                                        <i class="bi bi-hourglass-split"></i>
                                    </div>
                                    <div class="jd-stat-label">Deadline</div>
                                    <div class="jd-stat-value">{{$jobdetail->deadline?->diffForHumans() ?? ''}}</div>
                                </div>
                            </div>

                            <!-- ── Body ── -->
                            <div class="jd-body">
                                <div class="jd-content">
                                    {!! $jobdetail->{'description_' . app()->getLocale()} ?: $jobdetail->description_en !!}
                                </div>
                            </div>
                            <!-- /jd-body -->

                        </div>
                        <!-- /jd-card -->
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade vacancy_modal" id="vacancyModal_{{ $jobdetail->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content vacancy-modal-content">
                <!-- Modal Header -->
                <div class="modal-header vacancy-modal-header">
                    <div style="width: 100%;">
                        <h2 class="modal-title vacancy-modal-title" id="exampleModalLabel">Apply for
                            {{ $jobdetail->{'title_' . app()->getLocale()} ?: $jobdetail->title_en }}</h2>
                        <p class="vacancy-modal-subtitle">Join our team and make an impact</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white vacancy-modal-close-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
                            id="vacancyApplicationForm_{{ $jobdetail->id }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="modal_id" value="{{ $jobdetail->id }}">
                            <input type="hidden" name="validation_bag" value="{{ $validationBag }}">
                            <input type="hidden" name="application_type" value="open_application">
                            <input type="hidden" name="vacancy_id" value="{{ $jobdetail->id }}">
                            <!-- Full Name Field -->
                            <div class="vacancy-form-group">
                                <label for="vacancy{{ $jobdetail->id }}FullName" class="vacancy-form-label">Full Name <span
                                        class="required-asterisk">*</span></label>
                                <input type="text" name="full_name"
                                    class="form-control vacancy-form-input {{ $formErrors->has('full_name') ? 'is-invalid' : '' }}"
                                    id="vacancy{{ $jobdetail->id }}FullName" placeholder="Enter your full name"
                                    value="{{ $isActiveForm ? old('full_name') : '' }}">
                                @if ($formErrors->has('full_name'))
                                    <div class="invalid-feedback">{{ $formErrors->first('full_name') }}</div>
                                @endif
                            </div>

                            <!-- Email Field -->
                            <div class="vacancy-form-group">
                                <label for="vacancy{{ $jobdetail->id }}Email" class="vacancy-form-label">Email Address <span
                                        class="required-asterisk">*</span></label>
                                <input type="email" name="email"
                                    class="form-control vacancy-form-input {{ $formErrors->has('email') ? 'is-invalid' : '' }}"
                                    id="vacancy{{ $jobdetail->id }}Email" placeholder="your.email@example.com"
                                    value="{{ $isActiveForm ? old('email') : '' }}">
                                @if ($formErrors->has('email'))
                                    <div class="invalid-feedback">{{ $formErrors->first('email') }}</div>
                                @endif
                            </div>

                            <!-- Phone Field -->
                            <div class="vacancy-form-group">
                                <label for="vacancy{{ $jobdetail->id }}Phone" class="vacancy-form-label">Phone Number <span
                                        class="required-asterisk">*</span></label>
                                <input type="tel" name="phone_number"
                                    class="form-control vacancy-form-input {{ $formErrors->has('phone_number') ? 'is-invalid' : '' }}"
                                    id="vacancy{{ $jobdetail->id }}Phone" placeholder="+977-XXXXXXXXXX"
                                    value="{{ $isActiveForm ? old('phone_number') : '' }}">
                                @if ($formErrors->has('phone_number'))
                                    <div class="invalid-feedback">{{ $formErrors->first('phone_number') }}</div>
                                @endif
                            </div>

                            <!-- Resume Upload Field -->
                            <div class="vacancy-form-group">
                                <label for="vacancy{{ $jobdetail->id }}Resume" class="vacancy-form-label">Upload Your Resume <span
                                        class="required-asterisk">*</span></label>
                                <div class="vacancy-drop-zone" id="vacancyResumeDropZone_{{ $jobdetail->id }}">
                                    <input type="file" name="file"
                                        class="form-control {{ $formErrors->has('file') ? 'is-invalid' : '' }}"
                                        id="vacancy{{ $jobdetail->id }}Resume" accept=".pdf,.doc,.docx"
                                        style="display: none;">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                        stroke="var(--dark)" stroke-width="2" class="vacancy-drop-zone-icon">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <p class="vacancy-drop-zone-text">Click to upload or drag and drop</p>
                                    <p class="vacancy-drop-zone-subtext">PDF, DOC, or DOCX (Max 5MB)</p>
                                </div>
                                @if ($formErrors->has('file'))
                                    <div class="invalid-feedback d-block">{{ $formErrors->first('file') }}</div>
                                @endif
                            </div>

                            <!-- Cover Letter / Additional Info -->
                            <div class="vacancy-form-group">
                                <label for="vacancy{{ $jobdetail->id }}Message" class="vacancy-form-label">Why Should We Hire You?
                                    (Optional)</label>
                                <textarea name="why_hire_you"
                                    class="form-control vacancy-form-textarea {{ $formErrors->has('why_hire_you') ? 'is-invalid' : '' }}"
                                    id="vacancy{{ $jobdetail->id }}Message" rows="4"
                                    placeholder="Share your experience and why you're a great fit for this position...">{{ $isActiveForm ? old('why_hire_you') : '' }}</textarea>
                                @if ($formErrors->has('why_hire_you'))
                                    <div class="invalid-feedback">{{ $formErrors->first('why_hire_you') }}</div>
                                @endif
                            </div>

                            <!-- Terms Checkbox -->
                            <div class="vacancy-form-group">
                                <div class="vacancy-form-check">
                                    <input class="form-check-input vacancy-form-check-input" type="checkbox"
                                        name="is_agreed" id="vacancy{{ $jobdetail->id }}Terms" value="1"
                                        {{ $isActiveForm && old('is_agreed') ? 'checked' : '' }}>
                                    <label class="vacancy-form-check-label" for="vacancy{{ $jobdetail->id }}Terms">
                                        I agree that my information will be reviewed by the hiring team
                                    </label>
                                </div>
                                @if ($formErrors->has('is_agreed'))
                                    <div class="invalid-feedback d-block">{{ $formErrors->first('is_agreed') }}</div>
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
                        <button type="submit" form="vacancyApplicationForm_{{ $jobdetail->id }}"
                            class="btn btn-apply vacancy-modal-btn-submit">
                            <span>Send Application</span>
                        </button>
                    @endunless
                </div>
            </div>
        </div>
    </div>

    <!-- Script to Handle Vacancy Modal Form -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle resume drop zone for vacancy modal
            const vacancyResumeDropZone = document.getElementById('vacancyResumeDropZone_{{ $jobdetail->id }}');
            const vacancyResumeInput = document.getElementById('vacancy{{ $jobdetail->id }}Resume');

            if (vacancyResumeDropZone && vacancyResumeInput) {
                vacancyResumeDropZone.addEventListener('click', function() {
                    vacancyResumeInput.click();
                });

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    vacancyResumeDropZone.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    vacancyResumeDropZone.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    vacancyResumeDropZone.addEventListener(eventName, unhighlight, false);
                });

                function highlight(e) {
                    vacancyResumeDropZone.style.borderColor = 'var(--dark)';
                    vacancyResumeDropZone.style.backgroundColor = 'rgba(25, 57, 128, 0.05)';
                }

                function unhighlight(e) {
                    vacancyResumeDropZone.style.borderColor = 'var(--border)';
                    vacancyResumeDropZone.style.backgroundColor = 'transparent';
                }

                vacancyResumeDropZone.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    vacancyResumeInput.files = files;

                    if (files.length > 0) {
                        showSelectedFile(files[0].name);
                    }
                }

                vacancyResumeInput.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        showSelectedFile(this.files[0].name);
                    }
                });

                function showSelectedFile(fileName) {
                    const label = vacancyResumeDropZone.querySelector('.vacancy-drop-zone-text');

                    if (label) {
                        label.textContent = fileName + ' selected';
                        label.style.color = 'var(--dark)';
                        label.style.fontWeight = '600';
                    }
                }
            }
        });
    </script>

    @if ($activeModalId)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const targetModalId = @json('vacancyModal_' . $activeModalId);
                const targetModal = document.getElementById(targetModalId);

                if (targetModal) {
                    const modal = new bootstrap.Modal(targetModal);
                    modal.show();
                }
            });
        </script>
    @endif
@endsection
