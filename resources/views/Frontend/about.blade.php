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
                        commercial bank with nationwide coverage.
                    </p>

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
                <div class="col-lg-12">
                    <p class="about-text">
                        The farmer is a stalwart creating economic prosperity, and the latter is also tasked with leading
                        commercial bank with nationwide coverage. The company is expected to be a game-changer in the
                        digital financial ecosystem of Nepal, and it is expected to play a significant role in the
                        financial inclusion of the unbanked population of Nepal. The company is expected to be a
                        game-changer in the
                        digital financial ecosystem of Nepal, and it is expected to play a significant role in the
                        financial inclusion of the unbanked population of Nepal.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="leadership-section py-5"
        style="background-image:url('{{ asset('frontend/images/background_about.png') }}')">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-primary-blue fw-bold small">LEADING TEAM</span>
                <h2 class="fw-bold text-navy mt-1">Meet Our Leadership</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card h-100 border-0 shadow-sm text-center p-2">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('frontend/images/SanjeebKumarDeo.jpg') }}" class="img-fluid rounded"
                                alt="Sanjeeb Kumar Deo">
                        </div>
                        <div class="card-body px-0">
                            <h5 class="fw-bold text-navy mb-1">Sanjeeb Kumar Deo</h5>
                            <p class="text-muted small mb-0">Chief Executive Officer</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card h-100 border-0 shadow-sm text-center p-2">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('frontend/images/ShwetaBagla.jpg') }}" class="img-fluid rounded"
                                alt="Shweta Bagla">
                        </div>
                        <div class="card-body px-0">
                            <h5 class="fw-bold text-navy mb-1">Shweta Bagla</h5>
                            <p class="text-muted small mb-0">Chief Commercial Officer</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card h-100 border-0 shadow-sm text-center p-2">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('frontend/images/RabinKumarShrestha.png') }}" class="img-fluid rounded"
                                alt="Rabin Kumar Shrestha">
                        </div>
                        <div class="card-body px-0">
                            <h5 class="fw-bold text-navy mb-1">Rabin Kumar Shrestha</h5>
                            <p class="text-muted small mb-0">Chief Technology Officer</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card h-100 border-0 shadow-sm text-center p-2">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('frontend/images/PrakashBhandari.jpg') }}" class="img-fluid rounded"
                                alt="Prakash Bhandari">
                        </div>
                        <div class="card-body px-0">
                            <h5 class="fw-bold text-navy mb-1">Prakash Bhandari</h5>
                            <p class="text-muted small mb-0">Chief Operations & Finance Officer</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ══════════════ MISSION / VISION / GOAL ══════════════ -->
    <section class="mvg-section py-5">
        <div class="prayer-flags"></div>
        <div class="container">
            <div class="row">
                <!-- Mission -->
                <div class="col-lg-12 border_seperator">
                    <div class="mvg-card about_mvg-card">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mvg-images">
                                    <img src="{{ asset('frontend/images/Mission.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">

                                <p class="mvg-num">01</p>
                                <h4 class="mvg-title">Mission</h4>
                                <b>To become a trusted and reliable payment partner for seamless payment experience with
                                    innovation, reliability and transparency.</b>
                                <p class="mvg-text">"Financial systems need added level of security as they handle the
                                    hard-earned money of the people. Security and trust is a major challenge in making
                                    digital financial services acceptable to the wider populace. High security,
                                    trustworthiness as well as smooth, fast and accurate transactions are major factors that
                                    enable the users to adopt digital financial services. To address all these, a proven
                                    technological platform, an able workforce, a strict adherence to security standards and
                                    a long-term commitment towards continued investment in technological enhancement are
                                    crucial. NDPC has short-, medium- and long-term vision as well as commitment towards
                                    continued innovation and evolution to make digital financial services more secure,
                                    efficient and attractive."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vision -->
                <div class="col-lg-12 text-end border_seperator">
                    <div class="mvg-card about_mvg-card">
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="mvg-num">02</p>
                                <h4 class="mvg-title">Vision</h4>
                                <b>Help to improve financial inclusion through the  use of modern communication and
                                    financial technologies.</b>
                                <p class="mvg-text">"Help to improve financial inclusion through the use of modern
                                    communication and
                                    financial technologies." True financial inclusion is a major driver for economic
                                    development which is also true for Nepal as a developing country. Access to financial
                                    services and facilities is a major milestone to be achieved for tangible economic
                                    transformation. Since the proliferation of modern telecommunication services is good in
                                    the country, that platform can be leveraged to provide technology-based efficient
                                    financial services. For this, the best available solution is mobile financial services
                                    with a comprehensive portfolio to address all major financial services needed by the
                                    masses. NDPC aims to be a trusted partner of the same and provide a crucial support
                                    towards realization of the dream of digital Nepal.</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="mvg-images">
                                    <img src="{{ asset('frontend/images/Vision.jpg') }}" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Goal -->
                <div class="col-lg-12 border_seperator">
                    <div class="mvg-card about_mvg-card">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mvg-images">
                                    <img src="{{ asset('frontend/images/Goal.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p class="mvg-num">03</p>
                                <h4 class="mvg-title">Goal</h4>
                                <b>To provide an easy, affordable, innovative and reliable digital payment solution to
                                    customers.</b>
                                <p class="mvg-text">"To provide an easy, affordable, innovative and reliable digital
                                    payment
                                    solution to customers." The customers of digital financial services aspire to conduct
                                    all their day-to-day financial transactions in a secure and trusted manner. They want
                                    their money to be safe and their transactions transparent. They also want these services
                                    to evolve according to market trends, technological development and onset of new avenues
                                    of transactions. They want to have easy and affordable access. NDPC was established with
                                    an aim to provide quality mobile financial services across the country irrespective of
                                    the social and economic spectrum. Guided by this aim, the company shall continue working
                                    towards making the digital financial services more reliable, feature-rich and affordable
                                    for all.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ DARK BANNER ══════════════ -->

    <section class="banner-section" id="about_banner_section"
        style='background-image:url("{{ asset('frontend/images/background1.jpg') }}")'>
        <div class="container position-relative" style="z-index:2;">
            <div class="row align-items-center">
                <div class="col-lg-9 m-auto text-center">
                    <span class="built-badge">WHAT WE WANT</span>
                    <h2 class="banner-title">Our primary goal is of financial inclusion across the nation - ensuring that
                        every individual has access to quality, affordable financial services. </h2>

                </div>

            </div>
        </div>
    </section>

    <section id="testimonial_customer_says" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-primary-blue fw-bold small">TESTIMONAILS</span>
                <h2 class="fw-bold text-navy mt-1">What Our Leaders Say!</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 scroll-reveal from-left show">
                    <div class="tcl" role="region" aria-label="Testimonials">
                        <!-- LEFT: fixed slots -->
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-12">
                                <div class="custom_testimonial_slider_wrapper">
                                    <div class="tc-stack">
                                        <div id="slotPrev" class="tc-slot prev"></div>
                                        <div id="slotCenter" class="tc-slot center"></div>
                                        <div id="slotNext" class="tc-slot next"></div>
                                    </div>
                                    <div class="tc-nav">
                                        <button class="tc-btn tc-prev" aria-label="Previous"><i
                                                class="bi bi-arrow-left"></i></button>
                                        <button class="tc-btn tc-next" aria-label="Next"><i
                                                class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-12">
                                <!-- RIGHT: description of current (center) -->
                                <div class="tc-description_info">
                                    <div class="tc-card">
                                        <p id="tcQuote" class="tc-quote"></p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SOURCE LIST (real items live here; JS clones from here) -->
                    <div id="tcSource" hidden="">

                        <div class="tc-item" data-index="0">
                            <a class="tc-avatar"><img src="{{ asset('frontend/images/s1.jpg') }}" alt="Sophia Lee"></a>
                            <div class="tc-meta">
                                <p class="tc-name">Dipak Khadka</p>
                                <p class="tc-role">Chair Person</p>
                            </div>
                            <div class="tc-desc" hidden="">
                                <p>
                                    Nepal Digital Payments Company Limited (NDPC) was established to leverage advanced
                                    communication and financial technologies to promote financial inclusion and provide
                                    accessible digital payment solutions across Nepal. The company is committed to serving
                                    both urban and rural populations, with a focus on reaching unbanked and underserved
                                    communities.</p>
                                <p>NDPC delivers innovative digital payment services that improve efficiency and offer
                                    value-added services (VAS) to users. The platform is built with seamless integration,
                                    strong security standards, and a user-friendly interface to ensure a convenient and
                                    reliable payment experience.
                                </p>
                            </div>
                        </div>
                        <div class="tc-item" data-index="1">
                            <a class="tc-avatar"><img src="{{ asset('frontend/images/PrakashBhandari.jpg') }}"
                                    alt="Sophia Lee"></a>
                            <div class="tc-meta">
                                <p class="tc-name">Prakash Bhandari </p>
                                <p class="tc-role">Chief Human Resource & Finance Officer</p>
                            </div>
                            <div class="tc-desc" hidden="">
                                <p>
                                    At Nepal Digital Payments Company Limited (NDPC), our mission is to promote financial
                                    inclusion and digital empowerment throughout Nepal by providing secure, innovative, and
                                    accessible mobile financial services. We harness technology to bridge gaps, enhance
                                    daily life, and drive economic growth. Our solutions are designed to be reliable,
                                    user-friendly, and inclusive, enabling individuals from all regions and economic
                                    backgrounds to confidently participate in the digital economy.</p>
                                <p>Nepal's terrain being largely mountainous or hilly and internet connectivity can be
                                    limited, we have implemented USSD technology to deliver financial services to every
                                    corner of the country. This GSM-based solution operates without the need for internet,
                                    data, or even smartphones, making it an essential tool in our mission to reach
                                    underserved populations.</p>
                                <p>Our USSD platform is more than just convenient; it acts as a digital bridge for those
                                    without access to traditional banking. Users can easily perform transactions, ensuring
                                    that even the most remote communities are part of Nepal’s digital transformation. As we
                                    continue to innovate, our dedication to security, accessibility, and social impact
                                    remains steadfast. Together, we are laying the groundwork for a fully digital and
                                    financially inclusive Nepal.
                                </p>
                            </div>
                        </div>
                        <div class="tc-item" data-index="2">
                            <a class="tc-avatar"><img src="{{ asset('frontend/images/RabinKumarShrestha.png') }}"
                                    alt="Sophia Lee"></a>
                            <div class="tc-meta">
                                <p class="tc-name">Rabin Kumar Shrestha</p>
                                <p class="tc-role">Chief Technology Officer</p>
                            </div>

                            <div class="tc-desc" hidden="">
                                <p>
                                    At Nepal Digital Payments Company Limited (NDPC), our mission is to promote financial
                                    inclusion and digital empowerment throughout Nepal by providing secure, innovative, and
                                    accessible mobile financial services. We harness technology to bridge gaps, enhance
                                    daily life, and drive economic growth. Our solutions are designed to be reliable,
                                    user-friendly, and inclusive, enabling individuals from all regions and economic
                                    backgrounds to confidently participate in the digital economy.</p>
                                <p>Nepal's terrain being largely mountainous or hilly and internet connectivity can be
                                    limited, we have implemented USSD technology to deliver financial services to every
                                    corner of the country. This GSM-based solution operates without the need for internet,
                                    data, or even smartphones, making it an essential tool in our mission to reach
                                    underserved populations.</p>

                            </div>
                        </div>
                        <div class="tc-item" data-index="3">
                            <a class="tc-avatar"><img src="{{ asset('frontend/images/SanjeebKumarDeo.jpg') }}"
                                    alt="Sophia Lee"></a>
                            <div class="tc-meta">
                                <p class="tc-name">Shobhan Adhikari</p>
                                <p class="tc-role">Chairperson</p>
                            </div>
                            <div class="tc-desc" hidden="">
                                <p>
                                    At Nepal Digital Payments Company Limited (NDPC), our mission is to promote financial
                                    inclusion and digital empowerment throughout Nepal by providing secure, innovative, and
                                    accessible mobile financial services. We harness technology to bridge gaps, enhance
                                    daily life, and drive economic growth. Our solutions are designed to be reliable,
                                    user-friendly, and inclusive, enabling individuals from all regions and economic
                                    backgrounds to confidently participate in the digital economy.</p>
                                <p>Nepal's terrain being largely mountainous or hilly and internet connectivity can be
                                    limited, we have implemented USSD technology to deliver financial services to every
                                    corner of the country. This GSM-based solution operates without the need for internet,
                                    data, or even smartphones, making it an essential tool in our mission to reach
                                    underserved populations.</p>
                                <p>Our USSD platform is more than just convenient; it acts as a digital bridge for those
                                    without access to traditional banking. Users can easily perform transactions, ensuring
                                    that even the most remote communities are part of Nepal’s digital transformation. As we
                                    continue to innovate, our dedication to security, accessibility, and social impact
                                    remains steadfast. Together, we are laying the groundwork for a fully digital and
                                    financially inclusive Nepal.
                                </p>
                            </div>
                        </div>
                        <div class="tc-item" data-index="4">
                            <a class="tc-avatar"><img src="{{ asset('frontend/images/ShwetaBagla.jpg') }}"
                                    alt="Sophia Lee"></a>
                            <div class="tc-meta">
                                <p class="tc-name">Shweta Bagla </p>
                                <p class="tc-role">Chief Commercial Officer</p>
                            </div>
                            <div class="tc-desc" hidden="">
                                <p>
                                    At Nepal Digital Payments Company Limited (NDPC), our mission is to promote financial
                                    inclusion and digital empowerment throughout Nepal by providing secure, innovative, and
                                    accessible mobile financial services. We harness technology to bridge gaps, enhance
                                    daily life, and drive economic growth. Our solutions are designed to be reliable,
                                    user-friendly, and inclusive, enabling individuals from all regions and economic
                                    backgrounds to confidently participate in the digital economy.</p>
                                <p>Nepal's terrain being largely mountainous or hilly and internet connectivity can be
                                    limited, we have implemented USSD technology to deliver financial services to every
                                    corner of the country. This GSM-based solution operates without the need for internet,
                                    data, or even smartphones, making it an essential tool in our mission to reach
                                    underserved populations.</p>

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
        document.addEventListener('DOMContentLoaded', function() {
            // Grab source items (real data only lives here)
            const source = document.getElementById('tcSource');
            if (!source) {
                console.warn('tcSource not found in DOM.');
                return;
            }

            const items = Array.from(source.querySelectorAll('.tc-item'));
            if (!items.length) {
                console.warn('No .tc-item elements found inside #tcSource.');
                return;
            }

            // Helpers
            const wrap = (i, len) => (i % len + len) % len;

            // Slots (we will insert CLONES here each time)
            const slotPrev = document.getElementById('slotPrev');
            const slotCenter = document.getElementById('slotCenter');
            const slotNext = document.getElementById('slotNext');

            // UI
            const quoteEl = document.getElementById('tcQuote');
            const prevBtn = document.querySelector('.tc-prev');
            const nextBtn = document.querySelector('.tc-next');

            if (!slotPrev || !slotCenter || !slotNext || !quoteEl || !prevBtn || !nextBtn) {
                console.warn('Testimonial carousel: required elements missing.');
                return;
            }

            // Default center: middle of first three (index 1) if >=3, else 0
            let current = items.length >= 3 ? 1 : 0;

            function cloneInto(slotEl, itemIdx, makeFocusable = false) {
                slotEl.innerHTML = ''; // clear old
                const clone = items[itemIdx].cloneNode(true);

                // Clicking avatar in any slot should re-center to THAT real index
                const avatar = clone.querySelector('.tc-avatar');
                if (avatar) {
                    if (!avatar.getAttribute('href')) {
                        avatar.setAttribute('role', 'button');
                        avatar.setAttribute('tabindex', '0');
                    }
                    avatar.addEventListener('click', () => render(itemIdx));
                    avatar.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            render(itemIdx);
                        }
                    });
                }
                slotEl.appendChild(clone);

                if (makeFocusable && avatar) {
                    requestAnimationFrame(() => {
                        avatar.focus({
                            preventScroll: true
                        });
                    });
                }
            }

            function render(centerIdx) {
                if (!items.length) return;
                current = wrap(centerIdx, items.length);

                const prevIdx = wrap(current - 1, items.length);
                const nextIdx = wrap(current + 1, items.length);

                // Fill fixed slots with CLONES so order is always prev / center / next
                cloneInto(slotPrev, prevIdx, false);
                cloneInto(slotCenter, current, true);
                cloneInto(slotNext, nextIdx, false);

                // Description from the REAL center item
                const desc = items[current].querySelector('.tc-desc');
                if (quoteEl) {
                    quoteEl.textContent = desc ? desc.textContent.trim() : '';
                }
            }

            // Controls (wrap-around → first/last also land center-active)
            prevBtn.addEventListener('click', () => render(current - 1));
            nextBtn.addEventListener('click', () => render(current + 1));

            // Keyboard arrows
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') render(current + 1);
                if (e.key === 'ArrowLeft') render(current - 1);
            });

            // Init
            render(current);
        });
    </script>
@endpush
