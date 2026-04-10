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
                <div class="col-lg-3 col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/1a3a8f/fff?text=Blog'" alt="Blog 1">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">Prospects and Challenges of Digital Payment in Nepal</h6>
                            <p class="news-excerpt">Across various countries except years, Nepal's financial ecosystem has
                                undergone a remarkable shift, dr...</p>
                        </div>
                        <div class="news-footer">
                            <a href="{{ url('/blog-single') }}" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <a href="{{ url('/blog-single') }}">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1601597111158-2fceff292cdc?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/e8192c/fff?text=QR+Code'" alt="Blog 2">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">QR Codes: The 'Driving Force' Behind Fostering the Adoption of Digital
                                Payments in Nepal</h6>
                            <p class="news-excerpt">In the digital age, where convenience is paramount, Quick Response (QR)
                                plays an important role in e...</p>
                        </div>
                        <div class="news-footer">
                            <a href="{{ url('/blog-single') }}" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <a href="{{ url('/blog-single') }}">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/333/fff?text=KYC'" alt="Blog 3">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">KYC: Beyond the Compliance Requirement</h6>
                            <p class="news-excerpt">Nepal Rastra Bank (NRB) has made a mandatory Andos Know Your Customer
                                (KYC) requirement for digital e...</p>
                        </div>
                        <div class="news-footer">
                            <a href="#" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <a href="">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1512486130939-2c4f79935e4f?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/555/fff?text=USSD'" alt="Blog 4">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">Namaste Pay USSD (Offline) Mode</h6>
                            <p class="news-excerpt">USSD stands for 'Unstructured Supplementary Service Data (USSD) is a
                                technology that operates on the...</p>
                        </div>
                        <div class="news-footer">
                            <a href="#" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <a href="">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-lg-3 col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/1a3a8f/fff?text=Security'"
                            alt="Blog 5">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">Ensuring Namaste Pay Security</h6>
                            <p class="news-excerpt">Namaste Pay is a convenient mobile financial service (MFS) tool for
                                managing your finances. In...</p>
                        </div>
                        <div class="news-footer">
                            <a href="#" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <a href="">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/1a3a8f/fff?text=Security'"
                            alt="Blog 5">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">Ensuring Namaste Pay Security</h6>
                            <p class="news-excerpt">Namaste Pay is a convenient mobile financial service (MFS) tool for
                                managing your finances. In...</p>
                        </div>
                        <div class="news-footer">
                            <a href="#" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <a href="">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/1a3a8f/fff?text=Security'"
                            alt="Blog 5">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">Ensuring Namaste Pay Security</h6>
                            <p class="news-excerpt">Namaste Pay is a convenient mobile financial service (MFS) tool for
                                managing your finances. In...</p>
                        </div>
                        <div class="news-footer">
                            <a href="#" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <a href="">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/1a3a8f/fff?text=Security'"
                            alt="Blog 5">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">Ensuring Namaste Pay Security</h6>
                            <p class="news-excerpt">Namaste Pay is a convenient mobile financial service (MFS) tool for
                                managing your finances. In...</p>
                        </div>
                        <div class="news-footer">
                            <a href="#" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <a href="">
                                <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                            </a>
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
