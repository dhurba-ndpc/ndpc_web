@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Job Description</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our notices! Here you will find the latest news and updates from our team. We
                                    are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Job Description</span>
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
                                            <h1 class="jd-title">Product Designer</h1>
                                        </div>
                                    </div>

                                    {{-- <!-- Actions -->
                                    <div class="jd-header-actions">
                                        <button class="jd-icon-btn" title="Save job">
                                            <i class="bi bi-bookmark"></i>
                                        </button>
                                        <button class="jd-icon-btn" title="More options">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                    </div> --}}
                                </div>

                                <!-- Meta row -->
                                <div class="jd-meta-row">
                                    <div class="jd-meta-item">
                                        <i class="bi bi-briefcase"></i>
                                        Full-time
                                    </div>
                                    <div class="jd-meta-sep"></div>
                                    <div class="jd-meta-item">
                                        <i class="bi bi-geo-alt"></i>
                                        Kathmandu Nepal
                                    </div>
                                    <div class="jd-meta-sep"></div>
                                    <div class="jd-meta-item">
                                        <i class="bi bi-currency-rupee"></i>
                                        NRS 60k – 80.5k / month
                                    </div>
                                </div>

                                <!-- Tagline -->
                                <p class="jd-tagline">
                                    Join NDPC's design team to craft engaging experiences across mobile and web
                                    platforms.
                                </p>

                                <!-- CTA Buttons -->
                                <div class="jd-cta-row">
                                    <button class="btn-apply" data-bs-toggle="modal" data-bs-target="#vacancyModal_1">
                                        <i class="bi bi-lightning-charge-fill"></i>
                                        Easy apply
                                    </button>
                                    {{-- <button class="btn-resume">
                                        <i class="bi bi-stars"></i>
                                        Create resume
                                    </button> --}}
                                </div>
                            </div>

                            <!-- ── Stats ── -->
                            <div class="jd-stats">
                                <div class="jd-stat-cell">
                                    <div class="jd-stat-label">Experience Level</div>
                                    <div class="jd-stat-value">3+ years</div>
                                </div>
                                <div class="jd-stat-cell">
                                    <div class="jd-stat-label">Number of Applicants</div>
                                    <div class="jd-stat-value">50+ applicants</div>
                                </div>
                                <div class="jd-stat-cell">
                                    <div class="jd-stat-label">Matched Applicants</div>
                                    <div class="jd-stat-value">40+ matched</div>
                                </div>
                                <div class="jd-stat-cell">
                                    <div class="jd-stat-label">Last Reviewed</div>
                                    <div class="jd-stat-value">1d ago</div>
                                </div>
                            </div>

                            <!-- ── Body ── -->
                            <div class="jd-body">

                                <!-- About the Role -->
                                <div class="jd-section">
                                    <h2 class="jd-section-title">About the Role</h2>
                                    <p>
                                        As a Product Designer at NDPC, you'll be part of a cross-functional team building
                                        delightful user experiences that connect millions of listeners and creators. You'll
                                        work
                                        closely with product managers, researchers, and engineers to translate ideas into
                                        intuitive
                                        and accessible design solutions.
                                    </p>
                                </div>

                                <div class="jd-divider"></div>

                                <!-- Responsibilities -->
                                <div class="jd-section">
                                    <h2 class="jd-section-title">Responsibilities</h2>
                                    <ul class="jd-list">
                                        <li>Collaborate with PMs and engineers to define design goals.</li>
                                        <li>Create user flows, wireframes, and prototypes.</li>
                                        <li>Design consistent interfaces aligned with NDPC's design system.</li>
                                        <li>Present and justify design decisions based on user insights.</li>
                                        <li>Work closely with the UX research team to validate design outcomes.</li>
                                    </ul>
                                </div>

                                <div class="jd-divider"></div>

                                <!-- Requirements -->
                                <div class="jd-section">
                                    <h2 class="jd-section-title">Requirements</h2>
                                    <ul class="jd-list">
                                        <li>3+ years experience in UI/UX or Product Design.</li>
                                        <li>Strong portfolio demonstrating end-to-end design process.</li>
                                        <li>Proficiency in Figma and prototyping tools.</li>
                                        <li>Excellent communication and collaboration skills.</li>
                                        <li>Experience with design systems and accessibility standards.</li>
                                    </ul>
                                </div>

                                <div class="jd-divider"></div>

                                <!-- Nice to Have -->
                                <div class="jd-section" style="margin-bottom:0">
                                    <h2 class="jd-section-title">Nice to Have</h2>
                                    <ul class="jd-list">
                                        <li>Experience working on music or media-related products.</li>
                                        <li>Knowledge of motion design and micro-interactions.</li>
                                        <li>Familiarity with front-end development (HTML/CSS).</li>
                                    </ul>
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
    <div class="modal fade vacancy_modal" id="vacancyModal_1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(25, 57, 128, 0.2);">
                <!-- Modal Header -->
                <div class="modal-header" style="background: linear-gradient(135deg, var(--dark) 0%, #152f66 100%); border: none; padding: 30px 30px 20px;">
                    <div style="width: 100%;">
                        <h2 class="modal-title" id="exampleModalLabel" style="color: #fff; font-size: 1.5rem; font-weight: 700; margin: 0;">Apply for Laravel Developer</h2>
                        <p style="color: rgba(255,255,255,0.8); margin: 8px 0 0 0; font-size: 0.95rem;">Join our team and make an impact</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; right: 20px; top: 20px;"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" style="padding: 30px;">
                    <form id="vacancyApplicationForm_1">
                        <!-- Full Name Field -->
                        <div class="form-group mb-4">
                            <label for="vacancy1FullName" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Full Name <span style="color: var(--red);">*</span></label>
                            <input type="text" class="form-control" id="vacancy1FullName" placeholder="Enter your full name" required style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem;">
                        </div>

                        <!-- Email Field -->
                        <div class="form-group mb-4">
                            <label for="vacancy1Email" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Email Address <span style="color: var(--red);">*</span></label>
                            <input type="email" class="form-control" id="vacancy1Email" placeholder="your.email@example.com" required style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem;">
                        </div>

                        <!-- Phone Field -->
                        <div class="form-group mb-4">
                            <label for="vacancy1Phone" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Phone Number <span style="color: var(--red);">*</span></label>
                            <input type="tel" class="form-control" id="vacancy1Phone" placeholder="+977-XXXXXXXXXX" required style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem;">
                        </div>

                        <!-- Resume Upload Field -->
                        <div class="form-group mb-4">
                            <label for="vacancy1Resume" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Upload Your Resume <span style="color: var(--red);">*</span></label>
                            <div style="position: relative; border: 2px dashed var(--border); border-radius: 8px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.3s ease;" id="vacancyResumeDropZone_1">
                                <input type="file" class="form-control" id="vacancy1Resume" accept=".pdf,.doc,.docx" required style="display: none;">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--dark)" stroke-width="2" style="margin: 0 auto 8px; opacity: 0.6;">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <p style="color: var(--text-mid); font-weight: 600; margin: 0 0 4px;">Click to upload or drag and drop</p>
                                <p style="color: var(--text-soft); font-size: 0.85rem; margin: 0;">PDF, DOC, or DOCX (Max 5MB)</p>
                            </div>
                        </div>

                        <!-- Cover Letter / Additional Info -->
                        <div class="form-group mb-4">
                            <label for="vacancy1Message" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Why Should We Hire You? (Optional)</label>
                            <textarea class="form-control" id="vacancy1Message" rows="4" placeholder="Share your experience and why you're a great fit for this position..." style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem; resize: vertical;"></textarea>
                        </div>

                        <!-- Terms Checkbox -->
                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="vacancy1Terms" required style="width: 18px; height: 18px; cursor: pointer;">
                                <label class="form-check-label" for="vacancy1Terms" style="color: var(--text-mid); font-size: 0.9rem; cursor: pointer; margin-left: 8px;">
                                    I agree that my information will be reviewed by the hiring team
                                </label>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer" style="border-top: 1px solid var(--border); padding: 20px 30px; background: #fafbfc;">
                    <button type="button" class="btn" style="color: var(--text-mid); background: transparent; border: 1px solid var(--border); border-radius: 24px; padding: 8px 24px; font-weight: 600; transition: all 0.2s ease;" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="vacancyApplicationForm_1" class="btn btn-apply" style="padding: 8px 30px;">
                        <span>Send Application</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to Handle Vacancy Modal Form -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle vacancy form submission
            const vacancyForm = document.getElementById('vacancyApplicationForm_1');
            if (vacancyForm) {
                vacancyForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Get form data
                    const formData = new FormData(vacancyForm);
                    
                    // Change button state to show loading
                    const submitBtn = vacancyForm.querySelector('button[type="submit"]');
                    const originalText = submitBtn.textContent;
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Submitting...';
                    
                    // Simulate form submission (replace with actual API call)
                    setTimeout(function() {
                        // Success message
                        alert('Thank you for your application! We will contact you soon.');
                        
                        // Reset form
                        vacancyForm.reset();
                        
                        // Reset button
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                        
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('vacancyModal_1'));
                        modal.hide();
                    }, 1500);
                });
            }

            // Handle resume drop zone for vacancy modal
            const vacancyResumeDropZone = document.getElementById('vacancyResumeDropZone_1');
            const vacancyResumeInput = document.getElementById('vacancy1Resume');
            
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
                        vacancyResumeDropZone.innerHTML = '<p style="color: var(--dark); font-weight: 600; margin: 0;">✓ ' + files[0].name + ' selected</p>';
                    }
                }

                vacancyResumeInput.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        vacancyResumeDropZone.innerHTML = '<p style="color: var(--dark); font-weight: 600; margin: 0;">✓ ' + this.files[0].name + ' selected</p>';
                    }
                });
            }
        });
    </script>
@endsection
