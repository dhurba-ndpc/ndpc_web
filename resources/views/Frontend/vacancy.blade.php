@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Vacancy</h1>
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
                                <span>Home -> Vacancy</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="job_vacancy_section_wrapper">
        <div class="container">
            
            <div class="job-vacancy-card p-4">
                <div class="d-flex justify-content-between align-items-start align-items-center mb-3">
                    <h2 class="job-title h4 mb-0">MIS Officer</h2>
                    <small class="posted-date">Expire on: 1 months from now</small>
                </div>

                <div class="job-tags mb-4">
                    <span class="badge_custom-badge">Kathmandu</span>
                    <span class="badge_custom-badge mx-2">Full-time</span>

                </div>

                <div class="job-description">
                    <p class="description-text mb-2">
                        We are looking for a detail-oriented <strong>Laravel Developer</strong> to manage and report key
                        operational data including sales, stock, production, attendance, and accounts.

                        This role plays a vital part in supporting management through accurate, timely, and insightful
                        data reporting. Additional responsibilities include maintaining data integrity and generating
                        monthly performance audits.

                    </p>
                    <a href="{{ url('job-detail')}}" class="read-more-btn">Read More</a>
                </div>

                <div class="mt-4">
                    <button class="btn btn-apply px-4 py-2" data-bs-toggle="modal" data-bs-target="#vacancyModal_1">Easy Apply</button>
                </div>
            </div>
            <div class="job-vacancy-card p-4">
                <div class="d-flex justify-content-between align-items-start align-items-center mb-3">
                    <h2 class="job-title h4 mb-0">MIS Officer</h2>
                    <small class="posted-date">Expire on: 1 months from now</small>
                </div>

                <div class="job-tags mb-4">
                    <span class="badge_custom-badge">Kathmandu</span>
                    <span class="badge_custom-badge mx-2">Full-time</span>

                </div>

                <div class="job-description">
                    <p class="description-text mb-2">
                        We are looking for a detail-oriented <strong>Officer</strong> to manage and report key
                        operational data including sales, stock, production, attendance, and accounts.

                        This role plays a vital part in supporting management through accurate, timely, and insightful
                        data reporting. Additional responsibilities include maintaining data integrity and generating
                        monthly performance audits.

                    </p>
                    <a href="{{ url('job-detail')}}" class="read-more-btn">Read More</a>
                </div>

                <div class="mt-4">
                    <button class="btn btn-apply px-4 py-2">Easy Apply</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="free_apply_postion_wrapper">
                        <div class="text-center py-5">
                            <h3 style="color: var(--dark); margin-bottom: 20px; font-size: 1.8rem; font-weight:700;">Want to Apply?</h3>
                            <p style="color: var(--text-mid); margin-bottom: 30px; font-size: 1rem;">
                                Submit your general application and we'll match you with opportunities that fit your profile
                            </p>
                            <button class="btn btn-apply px-5 py-2" data-bs-toggle="modal" data-bs-target="#generalApplicationModal">
                                Submit Your Application
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Existing Vacancy Modal -->
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

    <!-- General Application Modal - Auto-trigger on Page Visit -->
    <div class="modal fade vacancy_modal" id="generalApplicationModal" tabindex="-1" aria-labelledby="generalApplicationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: none; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(25, 57, 128, 0.2);">
                <!-- Modal Header -->
                <div class="modal-header" style="background: linear-gradient(135deg, var(--dark) 0%, #152f66 100%); border: none; padding: 30px 30px 20px;">
                    <div style="width: 100%;">
                        <h2 class="modal-title" id="generalApplicationLabel" style="color: #fff; font-size: 1.5rem; font-weight: 700; margin: 0;">Join Our Team</h2>
                        <p style="color: rgba(255,255,255,0.8); margin: 8px 0 0 0; font-size: 0.95rem;">Explore exciting career opportunities with us</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; right: 20px; top: 20px;"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" style="padding: 30px;">
                    <div style="background: #f4f7fc; padding: 16px; border-radius: 12px; margin-bottom: 24px; border-left: 4px solid var(--ndpc_style);">
                        <p style="margin: 0; color: var(--text-mid); font-size: 0.95rem; line-height: 1.6;">
                            <strong>Welcome!</strong> We're always looking for talented professionals to join our growing team. Submit your general application below, and we'll keep your profile on file. Whenever a position matches your skills and experience, we'll reach out to you directly.
                        </p>
                    </div>

                    <form id="generalApplicationForm">
                        <!-- Full Name Field -->
                        <div class="form-group mb-4">
                            <label for="generalFullName" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Full Name <span style="color: var(--red);">*</span></label>
                            <input type="text" class="form-control" id="generalFullName" placeholder="Enter your full name" required style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem;">
                        </div>

                        <!-- Email Field -->
                        <div class="form-group mb-4">
                            <label for="generalEmail" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Email Address <span style="color: var(--red);">*</span></label>
                            <input type="email" class="form-control" id="generalEmail" placeholder="your.email@example.com" required style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem;">
                        </div>

                        <!-- Phone Field -->
                        <div class="form-group mb-4">
                            <label for="generalPhone" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Phone Number <span style="color: var(--red);">*</span></label>
                            <input type="tel" class="form-control" id="generalPhone" placeholder="+977-XXXXXXXXXX" required style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem;">
                        </div>

                        <!-- Position Interest Field -->
                        <div class="form-group mb-4">
                            <label for="generalPosition" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Position of Interest <span style="color: var(--red);">*</span></label>
                            <select class="form-control" id="generalPosition" required style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem;">
                                <option value="">-- Select a position --</option>
                                <option value="MIS Officer">MIS Officer</option>
                                <option value="Laravel Developer">Laravel Developer</option>
                                <option value="Other">Other Position</option>
                            </select>
                        </div>

                        <!-- Resume Upload Field -->
                        <div class="form-group mb-4">
                            <label for="generalResume" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Upload Your Resume <span style="color: var(--red);">*</span></label>
                            <div style="position: relative; border: 2px dashed var(--border); border-radius: 8px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.3s ease;" id="resumeDropZone">
                                <input type="file" class="form-control" id="generalResume" accept=".pdf,.doc,.docx" required style="display: none;">
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
                            <label for="generalMessage" style="color: var(--text-dark); font-weight: 600; margin-bottom: 8px; display: block;">Tell Us About Yourself (Optional)</label>
                            <textarea class="form-control" id="generalMessage" rows="4" placeholder="Share your career goals, skills, and what makes you a great fit for our team..." style="border-radius: 8px; border: 1px solid var(--border); padding: 10px 14px; font-size: 0.95rem; resize: vertical;"></textarea>
                        </div>

                        <!-- Terms Checkbox -->
                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="generalTerms" required style="width: 18px; height: 18px; cursor: pointer;">
                                <label class="form-check-label" for="generalTerms" style="color: var(--text-mid); font-size: 0.9rem; cursor: pointer; margin-left: 8px;">
                                    I agree to be contacted about job opportunities and company updates
                                </label>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer" style="border-top: 1px solid var(--border); padding: 20px 30px; background: #fafbfc;">
                    <button type="button" class="btn" style="color: var(--text-mid); background: transparent; border: 1px solid var(--border); border-radius: 24px; padding: 8px 24px; font-weight: 600; transition: all 0.2s ease;" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="generalApplicationForm" class="btn btn-apply" style="padding: 8px 30px;">
                        <span id="submitButtonText">Submit Application</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to Auto-trigger Modal on Page Visit -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the user has already seen the modal in this session
            const modalShown = sessionStorage.getItem('generalApplicationModalShown');
            
            if (!modalShown) {
                // Show the modal after 1 second to ensure page is fully loaded
                setTimeout(function() {
                    const modal = new bootstrap.Modal(document.getElementById('generalApplicationModal'), {
                        backdrop: 'static',  // Prevent closing by clicking outside
                        keyboard: false      // Prevent closing by ESC key
                    });
                    modal.show();
                    
                    // Mark that modal has been shown
                    sessionStorage.setItem('generalApplicationModalShown', 'true');
                }, 1000);
            }

            // Handle form submission
            const form = document.getElementById('generalApplicationForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Get form data
                    const formData = new FormData(form);
                    
                    // Change button state to show loading
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalText = submitBtn.textContent;
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Submitting...';
                    
                    // Simulate form submission (replace with actual API call)
                    setTimeout(function() {
                        // Success message
                        alert('Thank you for your application! We will contact you soon.');
                        
                        // Reset form
                        form.reset();
                        
                        // Reset button
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                        
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('generalApplicationModal'));
                        modal.hide();
                    }, 1500);
                });
            }

            // Handle resume drop zone
            const resumeDropZone = document.getElementById('resumeDropZone');
            const resumeInput = document.getElementById('generalResume');
            
            if (resumeDropZone && resumeInput) {
                resumeDropZone.addEventListener('click', function() {
                    resumeInput.click();
                });

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    resumeDropZone.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    resumeDropZone.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    resumeDropZone.addEventListener(eventName, unhighlight, false);
                });

                function highlight(e) {
                    resumeDropZone.style.borderColor = 'var(--dark)';
                    resumeDropZone.style.backgroundColor = 'rgba(25, 57, 128, 0.05)';
                }

                function unhighlight(e) {
                    resumeDropZone.style.borderColor = 'var(--border)';
                    resumeDropZone.style.backgroundColor = 'transparent';
                }

                resumeDropZone.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    resumeInput.files = files;
                    
                    if (files.length > 0) {
                        resumeDropZone.innerHTML = '<p style="color: var(--dark); font-weight: 600; margin: 0;">✓ ' + files[0].name + ' selected</p>';
                    }
                }

                resumeInput.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        resumeDropZone.innerHTML = '<p style="color: var(--dark); font-weight: 600; margin: 0;">✓ ' + this.files[0].name + ' selected</p>';
                    }
                });
            }
        });
    </script>
@endsection
 