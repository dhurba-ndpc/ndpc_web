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
                    <button class="btn btn-apply px-4 py-2" data-bs-toggle="modal" data-bs-target="#vacancyModal_1">Apply
                        Now</button>
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
                    <button class="btn btn-apply px-4 py-2">Apply Now</button>
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
 