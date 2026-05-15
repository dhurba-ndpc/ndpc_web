@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Blogs</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our blogs! Here you will find the latest news and updates from our team. We
                                    are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Blogs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ══════════════ NEWS / BLOGS ══════════════ -->
    <section class="news-section" id="innerPageBlogs">
        <div class="dots-pattern"></div>
        <div class="circular_floting_circle"></div>
        <div class="container">

            <p class="news-label mb-0">News/Blogs</p>
            <h2 class="news-title">Recent Entries</h2>

            <div class="row g-3">
                <!-- Card 1 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="news-card">
                        <img src="{{ asset('frontend/images/z2.jpg') }}" alt="Blog 1">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading"><a href="{{ url('/blog-single') }}">Prospects and Challenges of Digital Payment in
                                    Nepal</a></h6>
                            <p class="news-excerpt">In recent years, Nepal's financial ecosystem has undergone a remarkable
                                shift, driven by the transformative impact of the COVID-19 pandemic, and shifting consumer
                                behaviors.</p>
                        </div>
                        <div class="news-footer">
                            <a href="{{ url('/blog-single') }}" class="btn-read-sm">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                            {{-- <a href="{{ url('/blog-single') }}">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a> --}}
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="news-card">
                        <img src="{{ asset('frontend/images/z3.jpg') }}" alt="Blog 2">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading"><a href="{{ url('/blog-single') }}">QR Codes: The 'Driving Force' Behind Fostering the
                                    Adoption of Digital
                                    Payments in Nepal</a></h6>
                            <p class="news-excerpt">In the digital age, where convenience is paramount, Quick Response (QR)
                                plays an important role in accelerating the adoption of digital payments.</p>
                        </div>
                        <div class="news-footer">
                            <a href="{{ url('/blog-single') }}" class="btn-read-sm">Read More <i
                                    class="bi bi-arrow-right"></i></a>

                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="news-card">
                        <img src="{{ asset('frontend/images/z4.jpg') }}" alt="Blog 3">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading"><a href="{{ url('/blog-single') }}">KYC: Beyond the Compliance Requirement</a></h6>
                            <p class="news-excerpt">Nepal Rastra Bank (NRB) has made a mandatory Know Your Customer (KYC)
                                requirement for digital wallet companies since Shrawan 2081 for carrying out financial.</p>
                        </div>
                        <div class="news-footer">
                            <a href="{{ url('/blog-single') }}" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>

                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="news-card">
                        <img src="{{ asset('frontend/images/z5.jpeg') }}" alt="Blog 4">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading"><a href="{{ url('/blog-single') }}">Namaste Pay USSD (Offline) Mode</a></h6>
                            <p class="news-excerpt">USSD stands for ‘Unstructured Supplementary Service Data (USSD) is a
                                technology that operates on the GSM network, ensuring widespread coverage and availability
                                for customers.</p>
                        </div>
                        <div class="news-footer">
                            <a href="{{ url('/blog-single') }}" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>

                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="news-card">
                        <img src="{{ asset('frontend/images/z6.jpeg') }}" alt="Blog 5">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading"><a href="{{ url('/blog-single') }}">Ensuring Namaste Pay Security</a></h6>
                            <p class="news-excerpt">Namaste Pay is a convenient mobile financial service (MFS) tool for
                                managing your finances, but it's essential to prioritize security to protect your money and
                                personal information.</p>
                        </div>
                        <div class="news-footer">
                            <a href="{{ url('/blog-single') }}" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="page_pagination_wrap">
                        <nav>
                            <ul class="pagination custom-pagination">

                                <!-- Previous Button -->
                                <li class="page-item">
                                    <a class="page-link circle-btn" href="#">
                                        &#8592;
                                    </a>
                                </li>

                                <!-- Page Numbers -->
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>

                                <!-- Next Button -->
                                <li class="page-item">
                                    <a class="page-link circle-btn" href="#">
                                        &#8594;
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
