@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Our Product</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our company! We are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Our Product</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about" id="about_products">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Text -->
                <div class="col-lg-5">
                    <span class="know-badge">Nameste Pay</span>
                    <h1 class="section-title mb-3">Our <span>Products</span></h1>
                    <p class="about-text mb-3">
                        Mobile finance is not a new service in Nepal and is in use for over a decade. However, the
                        proportion of digital transactions is still low compared to traditional financial transactions. To
                        help fill the gap faster and realize a digital economy soon, an idea of a national level, dedicated
                        digital financial service provider got shape when a Memorandum of Understanding (MoU) was signed in
                        Jestha, 2076 between Nepal Doorsanchar Company Limited and Rastriya Banijya Bank.
                    </p>
                    <p class="about-text">
                        The farmer is a stalwart creating economic prosperity, and the latter is also tasked with leading
                        commercial bank with nationwide coverage ……
                    </p>
                </div>
                <!-- Image -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="about-img-wrap">
                        <div class="circular_floting_circle"></div>
                        <div class="dots-pattern"></div>
                        <div class="img_wrap_1">
                            <img src="{{ asset('frontend/images/Access2Finance.jpg') }}"
                                onerror="this.src='https://via.placeholder.com/700x300/1a3a8f/ffffff?text=NDPC+Team'"
                                alt="About NDPC" class="about-img">
                        </div>
                        <div class="trusted-badge glass-panel">
                            <i class="bi bi-shield-fill-check"></i>
                            <span>
                                Trusted <span>Financial</span><br>Partner for Nepal
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="solutions-section py-5" id="company_product_details">
        <div class="container">

            <!-- Title -->
            <div class="text-center mb-4">
                <p class="news-label mb-0">Products</p>
                <h2 class="news-title mb-1">Our Solutions</h2>
                <p class="main-desc mb-5">
                    Designed with scalability, security and adaptability at its core, our advanced tech stack is the
                    cornerstone of how we help partner BFIs grow and thrive.
                </p>
            </div>

            <!-- Tabs -->
            <ul class="nav nav-tabs justify-content-center custom-tabs mb-5" id="solutionTab">
                <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">Namaste
                        pay services</button></li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                        data-bs-target="#tab2">Neobanking</button></li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3">Digital
                        Wallet</button></li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4">Digital
                        Lending</button></li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab5">Payment
                        Switch</button></li>
                <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab6">Loyalty</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">

                <!-- TAB 1 -->
                <div class="tab-pane fade show active" id="tab1">

                    <div class="row align-items-center">

                        <!-- Left Image -->
                        <div class="col-lg-5 mb-4">
                            {{-- <div class="image-box">
                                <img src="{{ asset('frontend/images/Mission.jpg') }}" class="img-fluid">
                            </div> --}}
                            <div class="about-img-wrap">
                                <div class="circular_floting_circle"></div>
                                
                                <div class="img_wrap_1">
                                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=700&q=80"
                                        onerror="this.src='https://via.placeholder.com/700x300/1a3a8f/ffffff?text=NDPC+Team'"
                                        alt="About NDPC" class="about-img">
                                </div>
                                <div class="trusted-badge glass-panel">
                                    <i class="bi bi-shield-fill-check"></i>
                                    <span>
                                        Trusted <span>Financial</span><br>Partner for Nepal
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Content -->
                        <div class="col-lg-6 offset-lg-1">

                            <h3 class="content-title">Namaste pay services</h3>
                            <p class="content-desc">
                                By seamlessly integrating mobile, web and branch banking, our Omnichannel Banking solution
                                is designed to unify and elevate the customer experience.
                            </p>

                            <button class="btn btn-outline-primary mb-4">Discover More</button>

                            <!-- Stats Card -->
                            <div class="stats-card">

                                <div class="mb-3">
                                    <strong>USE CASE</strong>
                                </div>

                                <p class="small text-muted">
                                    Trusted by 50+ banks enabling a consistent digital experience to millions of users, our
                                    platform integrates seamlessly with legacy infrastructure to eliminate operational
                                    silos. By leveraging enterprise-grade security and real-time analytics, we empower
                                    institutions to scale rapidly while maintaining the highest standards of consumer trust.
                                </p>

                                <div class="row text-center mt-4">
                                    <div class="col-6 mb-3">
                                        <div class="score_counter">
                                            <h4>50+</h4>
                                            <small>Banks</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="score_counter">
                                            <h4>23M+</h4>
                                            <small>Customers</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="score_counter">
                                            <h4>2.2M+</h4>
                                            <small>Transactions Daily</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="score_counter">
                                            <h4>75%</h4>
                                            <small>Reduction</small>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
