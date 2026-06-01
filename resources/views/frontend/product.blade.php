@extends('frontend.layout.main')

@section('content')
 @include('frontend.partials.menu_head_banner', ['menu' => $menu])
    @if ($product !== null)
        <section class="section-about" id="about_products">
            <div class="container">
                <div class="row align-items-center g-5">
                    <!-- Text -->
                    <div class="col-lg-5">
                        <span class="know-badge">
                            {{ $product->{'badge_title_' . app()->getLocale()} ?? $product->badge_title_en ?? '' }}</span>
                        <h1 class="section-title mb-3 last_word_span_by_js">
                            {{ $product->{'title_' . app()->getLocale()} ?? $product->title_en ?? '' }}</h1>
                        <div class="about-text mb-3">
                            {!! $product->{'description_' . app()->getLocale()} ?? $product->description_en ?? '' !!}
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
                                    {!! $product->{'glass_text_' . app()->getLocale()} ?? $product->glass_text_en ?? '' !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($tech_detail->count() > 0)
        <section class="solutions-section py-5" id="company_product_details">

            <div class="container">

                <!-- Title -->
                <div class="text-center mb-4">
                    <p class="news-label mb-0"> {{ app()->getLocale() == 'ne' ? 'उत्पादनहरू' : 'Products' }}</p>
                    <h2 class="news-title mb-1"> {{ app()->getLocale() == 'ne' ? 'हाम्रो समाधान' : 'Our Solutions' }}</h2>
                    <div class="main-desc mb-5">
                        {{ $section_title->{'title_' . app()->getLocale()} ?? $section_title->title_en ?? '' }}
                    </div>
                </div>


                <!-- Tabs (Desktop Only) -->
                <ul class="nav nav-tabs justify-content-center custom-tabs mb-5 d-md-flex" id="solutionTab">
                    @foreach ($tech_detail as $key => $categries)
                        <li class="nav-item">
                            <button class="nav-link {{ $key === 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                data-bs-target="#tab{{ $key }}">
                                {{ $categries->{'title_' . app()->getLocale()} ?? $categries->title_en ?? '' }}
                            </button>
                        </li>
                    @endforeach

                </ul>
                <!-- Dropdown (Mobile Only) -->
                <div class="mb-4 mobile_menu_tab_select">
                    <select class="form-select" id="tabDropdown">
                        @foreach ($tech_detail as $key => $categries)
                            <option value="#tab{{ $key }}" {{ $key === 0 ? 'selected' : '' }}>
                                {{ $categries->{'title_' . app()->getLocale()} ?? $categries->title_en ?? '' }}
                            </option>
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
                                                    {{ $item->{'glass_text_' . app()->getLocale()} ?? $item->glass_text_en ?? '' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Content -->
                                    <div class="col-lg-6 offset-lg-1">

                                        <h3 class="content-title">
                                            {{ $item->{'title_' . app()->getLocale()} ?? $item->title_en ?? '' }}</h3>
                                        <div class="content-desc">
                                            {!! $item->{'short_description_' . app()->getLocale()} ?? $item->short_description_en ?? '' !!}
                                        </div>

                                        {{-- <button class="btn btn-outline-primary mb-4">Discover More</button> --}}

                                        <!-- Stats Card -->
                                        <div class="stats-card">

                                            <div class="mb-3">
                                                <strong>
                                                    {{ $item->{'use_case_title_' . app()->getLocale()} ?? $item->use_case_title_en ?? '' }}</strong>
                                            </div>

                                            <div class="small text-muted">
                                                {!! $item->{'use_case_description_' . app()->getLocale()} ?? $item->use_case_description_en ?? '' !!}
                                            </div>

                                            <div class="row text-center mt-4">
                                                <div class="col-6 mb-3">
                                                    <div class="score_counter">
                                                        <h4>{{ $item->stat_one_value }}</h4>
                                                        <small>
                                                            {{ $item->{'stat_one_label_' . app()->getLocale()} ?? $item->stat_one_label_en ?? '' }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <div class="score_counter">
                                                        <h4>{{ $item->stat_two_value }}</h4>
                                                        {{ $item->{'stat_two_label_' . app()->getLocale()} ?? $item->stat_two_label_en ?? '' }}
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="score_counter">
                                                        <h4>{{ $item->stat_three_value }}</h4>
                                                        {{ $item->{'stat_three_label_' . app()->getLocale()} ?? $item->stat_three_label_en ?? '' }}
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="score_counter">
                                                        <h4>{{ $item->stat_four_value }}</h4>
                                                        {{ $item->{'stat_four_label_' . app()->getLocale()} ?? $item->stat_four_label_en ?? '' }}
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
    @endif
    @if ($services->count() > 0)
        <section class="services-section">

            <div class="container">
                <p class="news-label mb-0"> {{ app()->getLocale() == 'ne' ? 'सेवाहरू' : 'Services' }}</p>
                <h2 class="news-title mb-5">
                    {{ app()->getLocale() == 'ne' ? 'हामी तपाइँको लागि के प्रस्ताव गर्छौं' : 'What We Offer For You' }}
                </h2>
                <div class="row row-gap-custom">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <div class="service-header">
                                    <i class="{{ $service->bootstrap_icon ?? '' }} service-icon"></i>
                                    <h4 class="service-title">
                                        {{ $service->{'title_' . app()->getLocale()} ?? $service->title_en ?? '' }}
                                    </h4>
                                </div>
                                <div class="service-text">
                                    {!! $service->{'description_' . app()->getLocale()} ?? $service->description_en ?? '' !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if ($features->count() > 0)
        <section class="features-section">
            <div class="prayer-flags"></div>
            <div class="container">
                <p class="news-label mb-0"> {{ app()->getLocale() == 'ne' ? 'सुविधाहरू' : 'Features' }}</p>
                <h2 class="news-title mb-5">
                    {{ app()->getLocale() == 'ne' ? 'हामी तपाइँको लागि के प्रस्ताव गर्छौं' : 'What We Offer For You' }}
                </h2>
                <div class="row g-4">
                    @foreach ($features as $feature)
                        <div class="col-lg-3 col-md-6">
                            <div class="feature-card text-center">
                                <div class="icon-circle">
                                    <i class="{{ $feature->bootstrap_icon ?? '' }}"></i>
                                </div>
                                <h4 class="feature-title">
                                    {{ $feature->{'title_' . app()->getLocale()} ?? $feature->title_en ?? '' }}
                                </h4>
                                <div class="feature-text">
                                    {!! $feature->{'description_' . app()->getLocale()} ?? $feature->description_en ?? '' !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif
    @if ($promotion_text !== null)
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="wallet-card text-center position-relative">

                        <div class="icon-tab">
                            <i class="bi bi-wallet2"></i>
                        </div>

                        <div class="card-body p-5">
                            <h6 class="text-blue fw-bold mb-2">
                                {{ $promotion_text->{'badge_title_' . app()->getLocale()} ?? $promotion_text->badge_title_en ?? '' }}
                            </h6>
                            <h1 class="main-title fw-bold">
                                {{ $promotion_text->{'title_' . app()->getLocale()} ?? $promotion_text->title_en ?? '' }}
                            </h1>
                        </div>

                        <a href="{{ url('about') }}" class="btn btn-pill-cta ">
                            {{ app()->getLocale() == 'ne' ? 'थप जान्न चाहनुहुन्छ?' : 'Want To Know More?' }}
                        </a>

                    </div>
                </div>
            </div>
        </div>
        </section>
    @endif
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
