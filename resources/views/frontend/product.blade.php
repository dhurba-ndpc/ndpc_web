@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('storage/' . $menu->image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1> {{ $menu->{'page_title_' . app()->getLocale()} ?: $menu->page_title_en }}</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                {!! $menu->{'description_' . app()->getLocale()} ?: $menu->description_en !!}
                            </div>
                            {{-- <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> About Us</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($product !== null)
        <section class="section-about" id="about_products">
            <div class="container">
                <div class="row align-items-center g-5">
                    <!-- Text -->
                    <div class="col-lg-5">
                        <span class="know-badge">
                            {{ $product->{'badge_title_' . app()->getLocale()} ?: $product->badge_title_en }}</span>
                        <h1 class="section-title mb-3 last_word_span_by_js">
                            {{ $product->{'title_' . app()->getLocale()} ?: $product->title_en }}</h1>
                        <div class="about-text mb-3">
                            {!! $product->{'description_' . app()->getLocale()} ?: $product->description_en !!}
                        </div>

                    </div>
                    <!-- Image -->
                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-img-wrap">
                            <div class="circular_floting_circle"></div>
                            <div class="dots-pattern"></div>
                            <div class="img_wrap_1">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="About NDPC" class="about-img">
                            </div>
                            <div class="trusted-badge glass-panel">
                                <i class="bi bi-shield-fill-check"></i>
                                <span class="glass_badge_text">
                                    {!! $product->{'glass_text_' . app()->getLocale()} ?: $product->glass_text_en !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="solutions-section py-5" id="company_product_details">

        <div class="container">

            <!-- Title -->
            <div class="text-center mb-4">
                <p class="news-label mb-0"> {{ app()->getLocale() == 'ne' ? 'उत्पादनहरू' : 'Products' }}</p>
                <h2 class="news-title mb-1"> {{ app()->getLocale() == 'ne' ? 'हाम्रो समाधान' : 'Our Solutions' }}</h2>
                <div class="main-desc mb-5">
                      {{ $section_title->{'title_' . app()->getLocale()} ?: $section_title->title_en }}
                </div>
            </div>


            <!-- Tabs (Desktop Only) -->
            <ul class="nav nav-tabs justify-content-center custom-tabs mb-5 d-md-flex" id="solutionTab">
                @foreach ($tech_detail as $key => $categries)
                    <li class="nav-item">
                        <button class="nav-link {{ $key === 0 ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#tab{{ $key }}">
                            {{ $categries->{'title_' . app()->getLocale()} ?: $categries->title_en }}
                        </button>
                    </li>
                @endforeach

            </ul>
            <!-- Dropdown (Mobile Only) -->
            <div class="mb-4 mobile_menu_tab_select">
                <select class="form-select" id="tabDropdown">
                    @foreach ($tech_detail as $key => $categries)
                        <option value="#tab{{ $key }}" {{ $key === 0 ? 'selected' : '' }}>
                            {{ $categries->{'title_' . app()->getLocale()} ?: $categries->title_en }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Tab Content -->
            <div class="tab-content">
                @foreach ($tech_detail as $key => $categries)
                    <div class="tab-pane fade show {{ $key === 0 ? 'active' : '' }}" id="tab{{ $key }}">
                        @foreach ($categries->items as $item)
                            <div class="row align-items-center">

                                <!-- Left Image -->
                                <div class="col-lg-5 mb-4">

                                    <div class="about-img-wrap">
                                        <div class="circular_floting_circle"></div>

                                        <div class="img_wrap_1">
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="About NDPC"
                                                class="about-img">
                                        </div>
                                        <div class="trusted-badge glass-panel">
                                            <i class="bi bi-shield-fill-check"></i>
                                            <span class="glass_badge_text">
                                                {{ $item->{'glass_text_' . app()->getLocale()} ?: $item->glass_text_en }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Content -->
                                <div class="col-lg-6 offset-lg-1">

                                    <h3 class="content-title">
                                        {{ $item->{'title_' . app()->getLocale()} ?: $item->title_en }}</h3>
                                    <div class="content-desc">
                                        {!! $item->{'short_description_' . app()->getLocale()} ?: $item->short_description_en !!}
                                    </div>

                                    {{-- <button class="btn btn-outline-primary mb-4">Discover More</button> --}}

                                    <!-- Stats Card -->
                                    <div class="stats-card">

                                        <div class="mb-3">
                                            <strong>
                                                {{ $item->{'use_case_title_' . app()->getLocale()} ?: $item->use_case_title_en }}</strong>
                                        </div>

                                        <div class="small text-muted">
                                            {!! $item->{'use_case_description_' . app()->getLocale()} ?: $item->use_case_description_en !!}
                                        </div>

                                        <div class="row text-center mt-4">
                                            <div class="col-6 mb-3">
                                                <div class="score_counter">
                                                    <h4>{{ $item->stat_one_value }}</h4>
                                                    <small>
                                                        {{ $item->{'stat_one_label_' . app()->getLocale()} ?: $item->stat_one_label_en }}</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <div class="score_counter">
                                                    <h4>{{ $item->stat_two_value }}</h4>
                                                    {{ $item->{'stat_two_label_' . app()->getLocale()} ?: $item->stat_two_label_en }}
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="score_counter">
                                                    <h4>{{ $item->stat_three_value }}</h4>
                                                    {{ $item->{'stat_three_label_' . app()->getLocale()} ?: $item->stat_three_label_en }}
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="score_counter">
                                                    <h4>{{ $item->stat_four_value }}</h4>
                                                    {{ $item->{'stat_four_label_' . app()->getLocale()} ?: $item->stat_four_label_en }}
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>
                @endforeach

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

                        <a href="{{ url('about') }}" class="btn btn-pill-cta ">
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
        // tab to dropdown query
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
    <script>
        $('.glass_badge_text').each(function() {

            var text = $(this).text().trim();
            var words = text.split(/\s+/);

            if (words.length >= 2) {
                words[1] = '<span class="case-word">' + words[1] + '</span>' + '<br />';
            }

            $(this).html(words.join(' '));
        });
    </script>
@endpush
