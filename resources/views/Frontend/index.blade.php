@extends('frontend.layout.main')

@section('content')
    <section class="hero">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                {{-- <div class="carousel-item active">
                    <img src="{{ asset('frontend/images/a1.jpg') }}" class="d-block w-100" alt="...">
                </div> --}}
                <div class="carousel-item active">
                    <img src="{{ asset('frontend/images/bbb2.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('frontend/images/bbb1.jpg') }}" class="d-block w-100" alt="...">
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
                    <h1 class="section-title mb-3 last_word_span_by_js">About Our Company</h1>
                    <p class="about-text mb-3">
                        Mobile finance is not a new service in Nepal and is in use for over a decade. However, the
                        proportion of digital transactions is still low compared to traditional financial transactions. To
                        help fill the gap faster and realize a digital economy sooner, an idea of a national level,
                        dedicated digital financial service provider got shape when a Memorandum of Understanding (MoU) was
                        signed in Jestha, 2076 between Nepal Doorsanchar Company Limited and Rastriya Banijya Bank.
                    </p>
                    <p class="about-text">
                        The former is a state-owned telecom operator, and the latter is also state-owned leading commercial
                        bank with nationwide coverage
                    </p>
                    <a href="{{ url('/about') }}" class="btn-readmore">Read More <i class="bi bi-arrow-right"></i></a>
                </div>

                <!-- Image -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="about-img-wrap">
                        <div class="circular_floting_circle"></div>
                        <div class="dots-pattern"></div>
                        <div class="img_wrap_1">
                            <img src="{{ asset('frontend/images/z1.png') }}" alt="About NDPC" class="about-img">
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
                        <a href="{{ url('/about') }}" class="btn-banner">Read More <i class="bi bi-arrow-right"></i></a>
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

                    <img src="{{ asset('frontend/images/z2.jpg') }}" alt="Featured Image" class="featured-img" />

                    <div class="featured-meta">
                        <i class="bi bi-clock"></i> Nov 24, 2025
                        <span class="sep">|</span>
                        <span class="cat-tag">Press Release</span>
                    </div>

                    <div class="featured-title">
                        Prospects and Challenges of Digital Payment in Nepal
                    </div>

                    <div class="featured-excerpt">
                        In recent years, Nepal's financial ecosystem has undergone a remarkable shift, driven by the
                        transformative impact of the COVID-19 pandemic, and shifting consumer behaviors. This transformation
                        has driven digital payments to the forefront.
                    </div>

                    <a href="{{ url('/blog-single') }}" class="featured-link">Read the full story &nbsp;<i
                            class="bi bi-arrow-right"></i></a>
                </div>

                <!-- ── ARCHIVE ── -->
                <div class="col-lg-6 offset-lg-1 col-md-12 archive-col">
                    <div class="archive-top">
                        <div class="sec-heading mb-0">Archive</div>
                        <a href="{{ url('/blogs') }}" class="view-all">View All Blogs <i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                    <!-- Item 1 -->
                    <div class="archive-item">
                        <img src="{{ asset('frontend/images/z3.jpg') }}" class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Press Release</div>
                            <a href="{{ url('/blog-single') }}">
                                <div class="archive-title">QR Codes: The ‘Driving Force’ Behind Fostering the Adoption of
                                    Digital Payments in Nepal.</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Feb 19, 2026</div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="archive-item">
                        <img src="{{ asset('frontend/images/z4.jpg') }}" class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Product</div>
                            <a href="{{ url('/blog-single') }}">
                                <div class="archive-title">KYC: Beyond the Compliance Requirement.</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Feb 06, 2026</div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="archive-item">
                        <img src="{{ asset('frontend/images/z5.jpeg') }}" class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Event</div>
                            <a href="{{ url('/blog-single') }}">
                                <div class="archive-title">Namaste Pay USSD (Offline) Mode.</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Jan 25, 2026</div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="archive-item">
                        <img src="{{ asset('frontend/images/z6.jpeg') }}" class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Event</div>
                            <a href="{{ url('/blog-single') }}">
                                <div class="archive-title">Ensuring Namaste Pay Security</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Oct 01, 2025</div>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="archive-item">
                        <img src="{{ asset('frontend/images/z7.jpg') }}" class="archive-thumb" alt="" />
                        <div class="archive-body">
                            <div class="archive-cat">Press Release</div>
                            <a href="{{ url('/blog-single') }}">
                                <div class="archive-title">Indian tourist in nepal? No stress just scan and pay. Accept
                                    instant payment via phonepe & BHIM app with Nameste Pay.</div>
                            </a>
                            <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;Sep 04, 2025</div>
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
                    <img src="{{ asset('frontend/images/q1.jpg') }}" alt="NDPC 4th AGM">
                    <div class="gallery-caption">Product Launch Ceremony</div>
                </div>


                <div class="gallery-card">
                    <img src="{{ asset('frontend/images/q2.jpeg') }}" alt="Oath Taking">
                    <div class="gallery-caption">Oath-taking ceremony of newly appointed Chairperson Ms. Reena Dongol</div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('frontend/images/q3.jpg') }}" alt="NDPC 3rd AGM">
                    <div class="gallery-caption">Inception of NDPC</div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('frontend/images/q4.jpg') }}" alt="NDPC 4th AGM">
                    <div class="gallery-caption">Digital Literacy Session during Global Money Week 2025</div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('frontend/images/q5.jpg') }}" alt="Oath Taking">
                    <div class="gallery-caption">NDPC 4th AGM</div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('frontend/images/q6.jpg') }}" alt="NDPC 3rd AGM">
                    <div class="gallery-caption">Oath-taking ceremony of former Chairperson, Mr. Jhabindra Lal Upadhyaya
                    </div>
                </div>

            </div>
        </div>
        {{-- gallery-nav galleryNext galleryTrack --}}


    </section>
    <section id="online_pay_logo_wrapper" class="brand-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <p class="section-label text-uppercase mb-2">Download Now</p>
                    <h2 class="section-title">Get the Namaste Pay App</h2>
                    <p class="text-muted mb-4">Available on Google Play and App Store for seamless digital payments.</p>
                    <div class="app-links d-flex justify-content-center gap-4">
                        <a href="#" class="app-link">
                            <img src="{{ asset('frontend/images/Google-Play-Logo.png') }}" alt="Download on Google Play">
                        </a>
                        <a href="#" class="app-link">
                            <img src="{{ asset('frontend/images/appstore.png') }}" alt="Download on App Store">
                        </a>
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
                autoplay: true,
                autoplayTimeout: 3200,
                autoplayHoverPause: true,
                dots: false,
                nav: false,
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
        });
    </script>
    <script>
        $('.last_word_span_by_js').each(function() {
            var text = $(this).text().trim();
            var words = text.split(/\s+/);
            var lastWord = words.pop();
            
            $(this).html(
                words.join(" ") + (words.length > 0 ? " " : "") + '<span class="last-word">' + lastWord +
                '</span>'
            );
        });
    </script>
@endpush
