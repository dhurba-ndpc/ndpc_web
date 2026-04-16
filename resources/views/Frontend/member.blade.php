@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>About Us</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our company! We are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> About Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="bord_member_photo_wrapper">
        <div class="container">
            
             <div class="text-center mb-5">
                <span class="text-primary-blue fw-bold small">ABOUT US</span>
                <h2 class="fw-bold text-navy mt-1">Our Board Of Directors</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="director-card shadow-sm border-0 text-center h-100">
                        <div class="p-4 d-flex flex-column h-100">
                            <div class="avatar-container mb-4">
                                <img src="{{ asset('frontend/images/s1.jpg') }}" alt="Shobhan Adhikari"
                                    class="avatar-img rounded-circle border border-5 border-white shadow">
                            </div>
                            <div class="card-content mt-auto">
                                <h2 class="h6 mb-2 fw-semibold director-name">Shobhan Adhikari</h2>
                                <span
                                    class="badge bg-primary text-white custom-badge px-3 mb-2 d-inline-block">Chairperson</span>
                                <p class="mb-0 text-muted small organisation-name">Nepal Telecom</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="director-card shadow-sm border-0 text-center h-100">
                        <div class="p-4 d-flex flex-column h-100">
                            <div class="avatar-container mb-4">
                                <img src="{{ asset('frontend/images/s2.jpg') }}" alt="Shalik Ram Subedi"
                                    class="avatar-img rounded-circle border border-5 border-white shadow">
                            </div>
                            <div class="card-content mt-auto">
                                <h2 class="h6 mb-2 fw-semibold director-name">Shalik Ram Subedi</h2>
                                <span
                                    class="badge badge-member text-muted custom-badge px-3 mb-2 d-inline-block">Member</span>
                                <p class="mb-0 text-muted small organisation-name">Nepal Telecom</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="director-card shadow-sm border-0 text-center h-100">
                        <div class="p-4 d-flex flex-column h-100">
                            <div class="avatar-container mb-4">
                                <img src="{{ asset('frontend/images/s3.png') }}" alt="Sanjeev Kumar Shrestha"
                                    class="avatar-img rounded-circle border border-5 border-white shadow">
                            </div>
                            <div class="card-content mt-auto">
                                <h2 class="h6 mb-2 fw-semibold director-name">Sanjeev Kumar Shrestha</h2>
                                <span
                                    class="badge badge-member text-muted custom-badge px-3 mb-2 d-inline-block">Member</span>
                                <p class="mb-0 text-muted small organisation-name">Nepal Telecom</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="director-card shadow-sm border-0 text-center h-100">
                        <div class="p-4 d-flex flex-column h-100">
                            <div class="avatar-container mb-4">
                                <img src="{{ asset('frontend/images/s4.jpg') }}" alt="Ananda Subedi"
                                    class="avatar-img rounded-circle border border-5 border-white shadow">
                            </div>
                            <div class="card-content mt-auto">
                                <h2 class="h6 mb-2 fw-semibold director-name">Ananda Subedi</h2>
                                <span
                                    class="badge badge-member text-muted custom-badge px-3 mb-2 d-inline-block">Member</span>
                                <p class="mb-0 text-muted small organisation-name">Rastriya Banijya Bank</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="director-card shadow-sm border-0 text-center h-100">
                        <div class="p-4 d-flex flex-column h-100">
                            <div class="avatar-container mb-4">
                                <img src="{{ asset('frontend/images/s5.png') }}" alt="Sony Shrestha"
                                    class="avatar-img rounded-circle border border-5 border-white shadow">
                            </div>
                            <div class="card-content mt-auto">
                                <h2 class="h6 mb-2 fw-semibold director-name">Sony Shrestha</h2>
                                <span
                                    class="badge badge-member text-muted custom-badge px-3 mb-2 d-inline-block">Member</span>
                                <p class="mb-0 text-muted small organisation-name">Rastriya Banijya Bank</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
