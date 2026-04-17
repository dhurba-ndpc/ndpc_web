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
                                    <button class="btn-resume">
                                        <i class="bi bi-stars"></i>
                                        Create resume
                                    </button>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Apply for Laravel Developer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group mt-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group mt-3">
                        <label for="resume">Upload Resume</label>
                        <input type="file" class="form-control" id="resume">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary">Send Application</button>
                </div>
            </div>
        </div>
    </div>
@endsection
