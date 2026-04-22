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
                        Namaste Pay is the mobile financial service run by Nepal Digital Payments Company Limited. It is the
                        first of its kind in terms of providing both online and offline mobile wallet service in the
                        Nepalese market. With this feature both smartphone and feature phone users can use the service
                        anytime and anyplace.
                    </p>
                    <p class="about-text">
                        The wallet will be identified by the mobile number of the user. Thus it shall be easier to work with
                        compared to the long and difficult-to-remember bank accounts. Even people without a bank account
                        shall be able to use the service. They shall be able to load their account at the nearby Namaste Pay
                        agents.
                    </p>
                </div>
                <!-- Image -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="about-img-wrap">
                        <div class="circular_floting_circle"></div>
                        <div class="dots-pattern"></div>
                        <div class="img_wrap_1">
                            <img src="{{ asset('frontend/images/Access2Finance.jpg') }}" alt="About NDPC" class="about-img">
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


            <!-- Tabs (Desktop Only) -->
            <ul class="nav nav-tabs justify-content-center custom-tabs mb-5 d-md-flex" id="solutionTab">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">Namaste pay
                        services</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2">Corporate Wallet</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3">SIM Distribution System</button>
                </li>
                 
            </ul>
            <!-- Dropdown (Mobile Only) -->
            <div class="mb-4 mobile_menu_tab_select">
                <select class="form-select" id="tabDropdown">
                    <option value="#tab1" selected>Namaste pay services</option>
                    <option value="#tab2">Corporate Wallet</option>
                    <option value="#tab3">SIM Distribution System</option>
                   
                </select>
            </div>
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
                                    <img src="{{ asset('frontend/images/z2.jpg') }}" alt="About NDPC" class="about-img">
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
                <div class="tab-pane fade" id="tab2">
                   
                    <div class="row align-items-center">

                        <!-- Left Image -->
                        <div class="col-lg-5 mb-4">
                            {{-- <div class="image-box">
                                <img src="{{ asset('frontend/images/Mission.jpg') }}" class="img-fluid">
                            </div> --}}
                            <div class="about-img-wrap">
                                <div class="circular_floting_circle"></div>

                                <div class="img_wrap_1">
                                    <img src="{{ asset('frontend/images/z2.jpg') }}" alt="About NDPC" class="about-img">
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

                            <h3 class="content-title">Corporate Wallet</h3>
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
                <div class="tab-pane fade text-center" id="tab3">
                    <i>3.Sorry, Content Not Available.</i>
                </div>
                

            </div>

        </div>
    </section>

    <section class="services-section">

        <div class="container">
            <p class="news-label mb-0">Services</p>
            <h2 class="news-title mb-5">What We Offer For You</h2>

            <div class="row row-gap-custom">

                <!-- Top-up -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-header">
                            <i class="bi bi-phone service-icon"></i>
                            <h4 class="service-title">Top-up</h4>
                        </div>
                        <p class="service-text">
                            With just a few taps, you can top up your phone anytime, anywhere, ensuring you never run out of
                            talk time.
                        </p>
                    </div>
                </div>

                <!-- Utility Bill Payments -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-header">
                            <i class="bi bi-credit-card-2-front service-icon"></i>
                            <h4 class="service-title">Utility Bill Payments</h4>
                        </div>
                        <p class="service-text">
                            Effortlessly pay all your utility bills, including electricity, internet, landline, TV, and
                            water, with just one click using Namaste Pay.
                        </p>
                    </div>
                </div>

                <!-- Ticket Booking -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-header">
                            <i class="bi bi-ticket-perforated service-icon"></i>
                            <h4 class="service-title">Ticket Booking</h4>
                        </div>
                        <p class="service-text">
                            Whether you’re planning a business trip or a vacation, experience the convenience of booking
                            your tickets with Namaste Pay.
                        </p>
                    </div>
                </div>

                <!-- Merchant Payment -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-header">
                            <i class="bi bi-qr-code-scan service-icon"></i>
                            <h4 class="service-title">Merchant Payment</h4>
                        </div>
                        <p class="service-text">
                            Scan QR codes and make payments easily for the products and services you desire. No need to
                            worry about carrying cash when Namaste Pay is your payment partner.
                        </p>
                    </div>
                </div>

                <!-- Reward Points -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-header">
                            <i class="bi bi-stars service-icon"></i>
                            <h4 class="service-title">Reward Points</h4>
                        </div>
                        <p class="service-text">
                            Namaste Pay is not only the payment app but also you can get rewards and loyalty points. You
                            will earn those points while you make transactions via Namaste Pay.
                        </p>
                    </div>
                </div>

                <!-- Fund Transfer -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-header">
                            <i class="bi bi-wallet2 service-icon"></i>
                            <h4 class="service-title">Fund Transfer</h4>
                        </div>
                        <p class="service-text">
                            With Namaste Pay, transferring funds between Namaste Pay wallets and from Namaste Pay wallets to
                            bank accounts is simple and convenient.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="features-section">
        <div class="prayer-flags"></div>
        <div class="container">

            <!-- Heading -->


            <p class="news-label mb-0">Features</p>
            <h2 class="news-title mb-5">What We Offer For You</h2>

            <!-- Cards -->
            <div class="row g-4">

                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card text-center">
                        <div class="icon-circle">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h4 class="feature-title">Fast Registration</h4>
                        <p class="feature-text">
                            Experience the convenience of fast registration with Namaste Pay.
                            Register yourself quickly and effortlessly, saving your valuable time.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card text-center">
                        <div class="icon-circle">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h4 class="feature-title">Easy Transaction</h4>
                        <p class="feature-text">
                            Namaste Pay simplifies all your financial transactions, from paying bills
                            to transferring money with secure experience.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card text-center">
                        <div class="icon-circle">
                            <i class="bi bi-qr-code"></i>
                        </div>
                        <h4 class="feature-title">QR Code Payment</h4>
                        <p class="feature-text">
                            Convenient QR code payment service allows you to make transactions
                            simply by scanning QR code using mobile phone.
                        </p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card text-center">
                        <div class="icon-circle">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="feature-title">Secure and Reliable</h4>
                        <p class="feature-text">
                            Regulated by Nepal Rastra Bank, Namaste Pay ensures advanced security
                            measures to protect your personal data.
                        </p>
                    </div>
                </div>

            </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="wallet-card text-center position-relative">

                        <div class="icon-tab">
                            <i class="bi bi-wallet2"></i>
                        </div>

                        <div class="card-body p-5">
                            <h6 class="text-blue fw-bold mb-2">Get Ready</h6>
                            <h1 class="main-title fw-bold">Digital Wallet Redefined.</h1>
                        </div>

                        <a href="{{ url('about')}}" class="btn btn-pill-cta ">
                            Want To Know More?
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        document.getElementById('tabDropdown').addEventListener('change', function() {
            var selectedTab = this.value;

            // Activate selected tab
            var triggerEl = document.querySelector('[data-bs-target="' + selectedTab + '"]');
            var tab = new bootstrap.Tab(triggerEl);
            tab.show();
        });

        // Sync dropdown when tab clicked (desktop → mobile sync)
        var tabButtons = document.querySelectorAll('#solutionTab button');
        tabButtons.forEach(function(btn) {
            btn.addEventListener('shown.bs.tab', function(event) {
                document.getElementById('tabDropdown').value = event.target.getAttribute('data-bs-target');
            });
        });
    </script>
@endpush
