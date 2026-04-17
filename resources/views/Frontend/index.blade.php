@extends('frontend.layout.main')

@section('content')
    <section class="hero">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                {{-- <div class="carousel-item active">
                    <img src="{{ asset('frontend/images/a1.jpg') }}" class="d-block w-100" alt="...">
                </div> --}}
                <div class="carousel-item active">
                    <img src="{{ asset('frontend/images/a2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/images/a3.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- ══════════════ ABOUT ══════════════ -->
    <section class="section-about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text -->
                <div class="col-lg-5">
                    <span class="know-badge">KNOW US</span>
                    <h1 class="section-title mb-3">About Our <span>Company</span></h1>
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
                    <a href="#" class="btn-readmore">Read More <i class="bi bi-arrow-right"></i></a>
                </div>

                <!-- Image -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="about-img-wrap">
                        <div class="circular_floting_circle"></div>
                        <div class="dots-pattern"></div>
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
            </div>
        </div>
    </section>
    <!-- ══════════════ MISSION / VISION / GOAL ══════════════ -->
     <section class="mvg-section">
        <div class="prayer-flags"></div>
        <div class="container">
            <div class="row">
                <!-- Mission -->
                <div class="col-lg-4 col-md-6">
                    <div class="mvg-card">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3">
                                <div class="mvg-icon"><i class="bi bi-hand-thumbs-up-fill"></i></div>
                            </div>
                            <div class="col-lg-9 col-sm-9">

                                <p class="mvg-num">01</p>
                                <h4 class="mvg-title">Mission</h4>
                                <p class="mvg-text">"To become a trusted and reliable payment partner for seamless payment
                                    experience with innovation, reliability and transparency."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vision -->
                <div class="col-lg-4 col-md-6">
                    <div class="mvg-card">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3">
                                <div class="mvg-icon"><i class="bi bi-eye-fill"></i></div>
                            </div>
                            <div class="col-lg-9 col-sm-9">

                                <p class="mvg-num">02</p>
                                <h4 class="mvg-title">Vision</h4>
                                <p class="mvg-text">"Help to improve financial inclusion through the use of modern
                                    communication and
                                    financial technologies."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Goal -->
                <div class="col-lg-4 col-md-6">
                    <div class="mvg-card">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3">
                                <div class="mvg-icon"><i class="bi bi-bullseye"></i></div>
                            </div>
                            <div class="col-lg-9 col-sm-9">

                                <p class="mvg-num">03</p>
                                <h4 class="mvg-title">Goal</h4>
                                <p class="mvg-text">"To provide an easy, affordable, innovative and reliable digital payment
                                    solution to customers."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ══════════════ DARK BANNER ══════════════ -->

    <section class="banner-section" style='background : url("{{ asset('frontend/images/ads_image.jpg') }}")'>
        <div class="container position-relative" style="z-index:2;">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <div class="dark_banner_info">
                        <span class="built-badge">BUILT FOR NEPAL</span>
                        <h2 class="banner-title">Hassle Free Financial<br>Transactions.</h2>
                        <p class="banner-sub">Fast and secure digital financial services, at your finger tips.</p>
                        <a href="#" class="btn-banner">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    {{-- for now It is blank --}}
                </div>
            </div>
        </div>
    </section>
    <!-- ══════════════ NEWS / BLOGS ══════════════ -->
    <section class="news-section" id="blogs">
        <div class="container">
            <p class="news-label mb-0">News/Blogs</p>
            <h2 class="news-title">Recent Entries</h2>

            <div class="row g-0">

                <!-- ── FEATURED ── -->
                <div class="col-lg-5 col-md-12 featured-col">
                    <div class="sec-heading">Featured</div>

                    <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=900&q=80" alt="Featured Image"
                        class="featured-img" />



                    <div class="featured-meta">
                        <i class="bi bi-clock"></i> Nov 24, 2025
                        <span class="sep">|</span>
                        <span class="cat-tag">Press Release</span>
                    </div>

                    <div class="featured-title">
                        Group Contributes to Nepal's Physical Infrastructure Reconstruction Fund
                    </div>

                    <div class="featured-excerpt">
                        eSewa Ltd and Fonepay Payment Service Ltd jointly contribute a total of NPR
                        75,00,000 to the Government of Nepal's Physical Infrastructure Reconstruction...
                    </div>

                    <a href="#" class="featured-link">Read the full story &nbsp;<i
                            class="bi bi-arrow-right"></i></a>
                </div>

                <!-- ── ARCHIVE ── -->
                <div class="col-lg-6 offset-lg-1 col-md-12 archive-col">
                    <div class="archive-top">
                        <div class="sec-heading mb-0">Archive</div>
                        <a href="#" class="view-all">View All Blogs <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <!-- Item 1 -->
                    <div class="archive-item">
                        <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=300&q=80"
                            class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Press Release</div>
                            <a href="">
                                <div class="archive-title">Foneloan Partners with Rastriya Banijya Bank to Expand the Reach
                                    of
                                    Digital Credit</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Feb 19, 2026</div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="archive-item">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=300&q=80"
                            class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Product</div>
                            <a href="">
                                <div class="archive-title">Kumari Smart Makes Credit Even More Flexible With The Latest
                                    Foneloan Update</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Feb 06, 2026</div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="archive-item">
                        <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=300&q=80"
                            class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Event</div>
                            <a href="">
                                <div class="archive-title">Sabai Sadhai Sangai: A Promise 17 Years in the Making</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Jan 25, 2026</div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="archive-item">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=300&q=80"
                            class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Event</div>
                            <a href="">
                                <div class="archive-title">Fonepay Celebrates Six Years of Enabling Seamless Digital
                                    Payments
                                    Across Nepal</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Oct 01, 2025</div>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="archive-item">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=300&q=80"
                            class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Press Release</div>
                            <a href="">
                                <div class="archive-title">Fonepay Integrate CityPAY Wallet to Expand Nepal's Digital
                                    Payments</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Sep 04, 2025</div>
                        </div>
                    </div>

                    <!-- Item 6 -->
                    <div class="archive-item">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=300&q=80"
                            class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Press Release</div>
                            <a href="">
                                <div class="archive-title">Fonepay Integrate CityPAY Wallet to Expand Nepal's Digital
                                    Payments</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Sep 01, 2025</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ══════════════ NEWS / BLOGS ══════════════ -->
    <section class="news-section d-none" id="blogs">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <div></div>

                <a href="#" class="view-all">View All Blogs <i class="bi bi-arrow-right"></i></a>
            </div>
            <p class="news-label mb-0">News/Blogs</p>
            <h2 class="news-title">Recent Entries</h2>

            <div class="row g-3">
                <!-- Card 1 -->
                <div class="col-lg col-md-6">
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
                            <a href="#" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg col-md-6">
                    <div class="news-card">
                        <img src="https://images.unsplash.com/photo-1601597111158-2fceff292cdc?w=400&q=80"
                            onerror="this.src='https://via.placeholder.com/400x150/e8192c/fff?text=QR+Code'"
                            alt="Blog 2">
                        <div class="news-body">
                            <p class="news-meta"><i class="bi bi-clock me-1"></i>1 year ago</p>
                            <h6 class="news-heading">QR Codes: The 'Driving Force' Behind Fostering the Adoption of Digital
                                Payments in Nepal</h6>
                            <p class="news-excerpt">In the digital age, where convenience is paramount, Quick Response (QR)
                                plays an important role in e...</p>
                        </div>
                        <div class="news-footer">
                            <a href="#" class="btn-read-sm">Read More <i class="bi bi-arrow-right"></i></a>
                            <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg col-md-6">
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
                            <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg col-md-6">
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
                            <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-lg col-md-6">
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
                            <div class="btn-circle"><i class="bi bi-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ══════════════ GALLERY / MILESTONES ══════════════ -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <p class="gallery-label">OUR GALLERY</p>
            <h2 class="gallery-title">Our Milestones</h2>
            <div class="owl-carousel owl-theme" id="gallery_wrap">

                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?w=600&q=80"
                        onerror="this.src='https://via.placeholder.com/600x220/1a3a8f/fff?text=NDPC+4th+AGM'"
                        alt="NDPC 4th AGM">
                    <div class="gallery-caption">NDPC 4th AGM</div>
                </div>


                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=600&q=80"
                        onerror="this.src='https://via.placeholder.com/600x220/e8192c/fff?text=Oath-taking+Ceremony'"
                        alt="Oath Taking">
                    <div class="gallery-caption">Oath-taking ceremony of former Chairperson, Mr. Jhabindra Lal
                        Upadhyaya</div>
                </div>

                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=600&q=80"
                        onerror="this.src='https://via.placeholder.com/600x220/0d1b3e/fff?text=NDPC+3rd+AGM'"
                        alt="NDPC 3rd AGM">
                    <div class="gallery-caption">NDPC 3rd AGM</div>
                </div>

                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?w=600&q=80"
                        onerror="this.src='https://via.placeholder.com/600x220/1a3a8f/fff?text=NDPC+4th+AGM'"
                        alt="NDPC 4th AGM">
                    <div class="gallery-caption">NDPC 4th AGM</div>
                </div>

                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=600&q=80"
                        onerror="this.src='https://via.placeholder.com/600x220/e8192c/fff?text=Oath-taking+Ceremony'"
                        alt="Oath Taking">
                    <div class="gallery-caption">Oath-taking ceremony of former Chairperson, Mr. Jhabindra Lal
                        Upadhyaya</div>
                </div>

                <div class="gallery-card">
                    <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=600&q=80"
                        onerror="this.src='https://via.placeholder.com/600x220/0d1b3e/fff?text=NDPC+3rd+AGM'"
                        alt="NDPC 3rd AGM">
                    <div class="gallery-caption">NDPC 3rd AGM</div>
                </div>

            </div>
        </div>
        {{-- gallery-nav galleryNext galleryTrack --}}


    </section>
    <section id="online_pay_logo_wrapper" class="brand-section py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-7">
                    <p class="section-label text-uppercase mb-2">Trusted by</p>
                    <h2 class="section-title">Reliable logos for payment partners and financial networks</h2>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <p class="text-muted mb-0">A minimal, confident brand showcase built for desktop clarity and mobile
                        polish.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme logo-carousel" id="online_pay_logo_carousel">
                        <div class="item">
                            <div class="logo-card">
                                <img src="{{ asset('frontend/images/img1.jpg') }}" alt="Partner Logo 1">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo-card">
                                <img src="{{ asset('frontend/images/img2.jpg') }}" alt="Partner Logo 2">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo-card">
                                <img src="{{ asset('frontend/images/img1.jpg') }}" alt="Partner Logo 3">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo-card">
                                <img src="{{ asset('frontend/images/img2.jpg') }}" alt="Partner Logo 4">
                            </div>
                        </div>
                        <div class="item">
                            <div class="logo-card">
                                <img src="{{ asset('frontend/images/img1.jpg') }}" alt="Partner Logo 5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#gallery_wrap').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                nav: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            });

            $('#online_pay_logo_carousel').owlCarousel({
                loop: true,
                margin: 24,
                autoplay: true,
                autoplayTimeout: 3200,
                autoplayHoverPause: true,
                dots: false,
                nav: false,
                navText: ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    992: {
                        items: 5,
                    }
                }
            });
        });
    </script>
@endpush
