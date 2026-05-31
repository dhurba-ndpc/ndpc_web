@extends('frontend.layout.main')

@section('content')
    @if ($banners->count() > 0)
        <section class="hero">
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    @foreach ($banners as $key => $banner)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    @endif

    <!-- ══════════════ ABOUT ══════════════ -->
    @if ($about !== null)
        <section class="section-about" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Text -->
                    <div class="col-lg-5">
                        <span
                            class="know-badge">{{ $about->{'badge_text_' . app()->getLocale()} ?: $about->badge_text_en }}</span>
                        <h1 class="section-title mb-3 last_word_span_by_js">
                            {{ $about->{'title_' . app()->getLocale()} ?: $about->title_en }}</h1>
                        <div class="about-text mb-3">
                            {!! Str::limit($about->{'description_' . app()->getLocale()} ?: $about->description_en, 600) !!}
                        </div>
                        <a href="{{ url('/about') }}" class="btn-readmore">
                            {{ app()->getLocale() == 'ne' ? 'थप पढ्नुहोस्' : 'Read More' }}
                            <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-img-wrap">
                            <div class="circular_floting_circle"></div>
                            <div class="dots-pattern"></div>
                            <div class="img_wrap_1">
                                <img src="{{ asset('storage/' . $about->image) }}"
                                    alt="{{ $about->{'title_' . app()->getLocale()} ?: $about->title_en }}"
                                    class="about-img">
                            </div>
                            <div class="trusted-badge glass-panel">
                                <i class="bi bi-shield-fill-check"></i>
                                <span class="glass_badge_text">
                                    {!! $about->glass_text !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- ══════════════ MISSION / VISION / GOAL ══════════════ -->
    @if ($missionVission->count() > 0)
        <section class="mvg-section">
            <div class="prayer-flags"></div>
            <div class="container">
                <div class="row g-4">
                    <!-- Mission Vission and Goal -->
                    @foreach ($missionVission as $key => $mvg)
                        <div class="col-lg-4 col-md-6">
                            <div class="mvg-card">
                                @php
                                    $title = Str::lower($mvg->title_en);
                                @endphp

                                @if (Str::contains($title, 'mission'))
                                    <div class="mvg-icon">
                                        <i class="bi bi-hand-thumbs-up-fill"></i>
                                    </div>
                                @elseif (Str::contains($title, 'vision'))
                                    <div class="mvg-icon">
                                        <i class="bi bi-eye-fill"></i>
                                    </div>
                                @elseif (Str::contains($title, 'goal'))
                                    <div class="mvg-icon">
                                        <i class="bi bi-bullseye"></i>
                                    </div>
                                @else
                                    <div class="mvg-icon">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                @endif

                                <h4 class="mvg-title">
                                    {{ $mvg->{'title_' . app()->getLocale()} ?: $mvg->title_en }}
                                </h4>
                                <div class="mvg-text">
                                    {!! Str::limit(
                                        $mvg->{'description_' . app()->getLocale()} ?: $mvg->description_en,
                                        110,
                                        '... <a class="mission-vission" href="' . url('/about') . '#mission-vision-goal">More</a>',
                                    ) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ══════════════ DARK BANNER ══════════════ -->
    @if ($darkBanner !== null)
        <section class="banner-section" style='background : url("{{ asset('storage/' . $darkBanner->image) }}")'>
            <div class="container position-relative" style="z-index:2;">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6">
                        <div class="dark_banner_info">
                            <span
                                class="built-badge">{{ $darkBanner->{'title_' . app()->getLocale()} ?: $darkBanner->title_en }}</span>
                            <h2 class="banner-title">{!! $darkBanner->{'subtitle_' . app()->getLocale()} ?: $darkBanner->subtitle_en !!}</h2>
                            <p class="banner-sub">
                                {{ $darkBanner->{'description_' . app()->getLocale()} ?: $darkBanner->description_en }}</p>
                            <a href="{{ url('/about') }}" class="btn-banner">
                                {{ app()->getLocale() == 'ne' ? 'थप पढ्नुहोस्' : 'Read More' }}
                                <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        {{-- for now It is blank --}}
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- ══════════════ NEWS / BLOGS ══════════════ -->

    @if ($blogs->count() > 0)
        <section class="news-section" id="blogs">
            <div class="container">
                <p class="news-label mb-0"> {{ app()->getLocale() == 'ne' ? 'समाचार/ब्लगहरू' : 'News/Blogs' }}</p>
                <h2 class="news-title">{{ app()->getLocale() == 'ne' ? 'हालैका अभिलेखहरू' : 'Recent Entries' }}</h2>

                <div class="row g-0">
                    @foreach ($blogs as $blog)
                        <!-- ── FEATURED ── -->
                        @if ($loop->first)
                            <div class="col-lg-5 col-md-12 featured-col">
                                <div class="sec-heading">{{ app()->getLocale() == 'ne' ? 'विशेष प्रस्तुति' : 'Featured' }}
                                </div>

                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Featured Image"
                                    class="featured-img" />

                                <div class="featured-meta">
                                    <i class="bi bi-clock"></i>
                                    {{ optional($blog->created_at ?? $blog->updated_at)->format('M d, Y') }}

                                    @foreach ($blog->categories as $cats)
                                        <span class="sep">|</span>
                                        <span class="cat-tag">
                                            {{ $cats->{'title_' . app()->getLocale()} ?: $cats->title_en }}
                                        </span>
                                    @endforeach
                                </div>

                                <div class="featured-title">
                                    {{ $blog->{'title_' . app()->getLocale()} ?: $blog->title_en }}
                                </div>

                                <div class="featured-excerpt">
                                    {!! Str::limit($blog->{'description_' . app()->getLocale()} ?: $blog->description_en, 200) !!}
                                </div>

                                <a href="{{ route('blog-single', $blog->slug) }}" class="featured-link">
                                    {{ app()->getLocale() == 'ne' ? 'पूरा कथा पढ्नुहोस्' : 'Read the full story' }}
                                    &nbsp;<i class="bi bi-arrow-right"></i></a>
                            </div>
                        @endif
                    @endforeach
                    <!-- ── ARCHIVE ── -->
                    <div class="col-lg-6 offset-lg-1 col-md-12 archive-col">
                        <div class="archive-top">
                            <div class="sec-heading mb-0">{{ app()->getLocale() == 'ne' ? 'अभिलेख' : 'Archive' }}</div>
                            <a href="{{ url('/blogs') }}"
                                class="view-all">{{ app()->getLocale() == 'ne' ? 'सम्पूर्ण ब्लगहरू हेर्नुहोस्' : 'View All Blogs' }}
                                <i class="bi bi-arrow-right"></i></a>
                        </div>
                        @foreach ($blogs->skip(1) as $blog)
                            <!-- Item 1 -->
                            <div class="archive-item">
                                <img src="{{ asset('storage/' . $blog->image) }}" class="archive-thumb"
                                    alt="" />
                                <div class="archive-body">
                                    <div class="archive_list_cat">
                                        @foreach ($blog->categories as $cats)
                                            <div class="archive-cat">
                                                {{ $cats->{'title_' . app()->getLocale()} ?: $cats->title_en }}</div>
                                        @endforeach
                                    </div>

                                    <a href="{{ route('blog-single', $blog->slug) }}">
                                        <div class="archive-title">
                                            {!! Str::limit($blog->{'description_' . app()->getLocale()} ?: $blog->description_en, 90) !!}
                                        </div>
                                    </a>
                                    <div class="archive-date"><i class="bi bi-clock"></i>&nbsp;
                                        {{ optional($blog->created_at ?? $blog->updated_at)->format('M d, Y') }}</div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>

            </div>
        </section>
    @endif

    <!-- ══════════════ GALLERY / MILESTONES ══════════════ -->
    @if ($mileStone->count() > 0)
        <section class="gallery-section" id="gallery">
            <div class="container">
                <p class="gallery-label"> {{ app()->getLocale() == 'ne' ? 'हाम्रो ग्यालरी' : 'OUR GALLERY' }}</p>
                <h2 class="gallery-title">{{ app()->getLocale() == 'ne' ? 'हाम्रा प्रमुख उपलब्धिहरू' : 'Our Milestones' }}
                </h2>
                <div class="owl-carousel owl-theme" id="gallery_wrap">
                    @foreach ($mileStone as $gallery)
                        <div class="gallery-card">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="NDPC 4th AGM">
                            <div class="gallery-caption">
                                {{ $gallery->{'title_' . app()->getLocale()} ?: $gallery->title_en }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- gallery-nav galleryNext galleryTrack --}}
        </section>
    @endif

    @if ($app_link !== null)
        <section id="online_pay_logo_wrapper" class="brand-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <p class="section-label text-uppercase mb-2">
                            {{ $app_link->{'badge_title_' . app()->getLocale()} ?: $app_link->badge_title_en }}</p>
                        <h2 class="section-title"> {{ $app_link->{'title_' . app()->getLocale()} ?: $app_link->title_en }}
                        </h2>
                        <p class="text-muted mb-4">
                            {{ $app_link->{'short_description_' . app()->getLocale()} ?: $app_link->short_description_en }}
                        </p>
                        <div class="app-links d-flex justify-content-center gap-4">
                            <a href="{{ url($app_link->google_play_store_link) }}" class="app-link">
                                <img src="{{ asset('frontend/images/Google-Play-Logo.png') }}"
                                    alt="Download on Google Play">
                            </a>
                            <a href="{{ url($app_link->app_store_link) }}" class="app-link">
                                <img src="{{ asset('frontend/images/appstore.png') }}" alt="Download on App Store">
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
