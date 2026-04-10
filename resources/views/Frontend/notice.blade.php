@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Notices</h1>
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
                                <span>Home -> Notices</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-notice">
        <div class="container">

            <!-- Header -->
            <div class="row align-items-center mb-4">
                <div class="col-md-6 section-title">
                      <h1 class="section-title mb-3">Our&nbsp;<span>Notices</span></h1>
                    <p>Latest news and announcements from NDPC</p>
                </div>

                <div class="col-md-6">
                    <div class="search-box">
                        <input type="text" placeholder="Search notices...">
                        <button><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>

            <!-- Notices Grid -->
            <div class="row g-4">

                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="notice-card">
                        <span class="tag">IS Audit</span>
                        <h5>Extension of submission date for proposal on Information System (IS) Audit</h5>
                        <div class="notice-footer">
                            <span><i class="bi bi-calendar-fill"></i>&nbsp;4 days ago</span>
                            <a href="#" class="btn btn-notice">View Notice&nbsp;&nbsp;<i class="bi bi-eye-fill"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="notice-card">
                        <span class="tag">Quotation</span>
                        <h5>Sealed Quotation Request notice-Outsource Employee</h5>
                        <div class="notice-footer">
                            <span><i class="bi bi-calendar-fill"></i>&nbsp;4 days ago</span>
                            <a href="#" class="btn btn-notice">View Notice&nbsp;&nbsp;<i class="bi bi-eye-fill"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="notice-card">
                        <span class="tag">IS Audit</span>
                        <h5>Invitation for proposal on Information System (IS) Audit</h5>
                        <div class="notice-footer">
                            <span><i class="bi bi-calendar-fill"></i>&nbsp;1 week ago</span>
                            <a href="#" class="btn btn-notice">View Notice&nbsp;&nbsp;<i class="bi bi-eye-fill"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-4">
                    <div class="notice-card">
                        <span class="tag">RTI</span>
                        <h5>NDPC - RTI (01/07/2082 - 30/09/2082)</h5>
                        <div class="notice-footer">
                            <span><i class="bi bi-calendar-fill"></i>&nbsp;1 week ago</span>
                            <a href="#" class="btn btn-notice">View Notice&nbsp;&nbsp;<i class="bi bi-eye-fill"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-md-4">
                    <div class="notice-card">
                        <span class="tag">General Meeting</span>
                        <h5>Notice for 5th Annual General Meeting</h5>
                        <div class="notice-footer">
                            <span><i class="bi bi-calendar-fill"></i>&nbsp;April 15, 2024</span>
                            <a href="#" class="btn btn-notice">View Notice&nbsp;&nbsp;<i class="bi bi-eye-fill"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="col-md-4">
                    <div class="notice-card">
                        <span class="tag">General Meeting</span>
                        <h5>Notice for 5th Annual General Meeting</h5>
                        <div class="notice-footer">
                            <span><i class="bi bi-calendar-fill"></i>&nbsp;April 15, 2024</span>
                            <a href="#" class="btn btn-notice">View Notice&nbsp;&nbsp;<i class="bi bi-eye-fill"></i></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
