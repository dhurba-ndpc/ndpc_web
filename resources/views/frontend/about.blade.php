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
    <!-- ══════════════ ABOUT ══════════════ -->
    @if ($about !== null)
        @php
            $description = $about->{'description_' . app()->getLocale()} ?: $about->description_en;
            $words = explode(' ', $description);
            $firstPart = implode(' ', array_slice($words, 0, 85));
            $secondPart = implode(' ', array_slice($words, 85));
        @endphp

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
                            {!! $firstPart !!}
                        </div>

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
                    <div class="col-lg-12">
                        {!! $secondPart !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($leadingTeam->count() > 0)
        <section class="leadership-section py-5"
            style="background-image:url('{{ asset('frontend/images/background_about.png') }}')">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="text-primary-blue fw-bold small">
                        {{ app()->getLocale() == 'ne' ? 'नेतृत्व टोली' : 'LEADING TEAM' }}</span>
                    <h2 class="fw-bold text-navy mt-1">
                        {{ app()->getLocale() == 'ne' ? 'हाम्रो नेतृत्व टोलीसँग परिचित हुनुहोस्' : 'Meet Our Leadership' }}
                    </h2>
                </div>

                <div class="row g-4 justify-content-center">

                    @foreach ($leadingTeam as $list)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="team-card h-100 border-0 shadow-sm text-center p-2">
                                <div class="card-img-wrapper">
                                    <img src="{{ asset('storage/' . $list->image) }}" class="img-fluid rounded"
                                        alt="{{ $list->name_en }}">
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="fw-bold text-navy mb-1">
                                        {{ $list->{'name_' . app()->getLocale()} ?: $list->name_en }}</h5>
                                    <p class="text-muted small mb-0">
                                        {{ $list->{'designation_' . app()->getLocale()} ?: $list->designation_en }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!-- ══════════════ MISSION / VISION / GOAL ══════════════ -->
    @if ($missionVission->count() > 0)
        <section class="mvg-section py-5" id="mission-vision-goal">
            <div class="prayer-flags"></div>
            <div class="container">
                <div class="row">
                    @foreach ($missionVission as $key => $mvg)
                        <div class="col-lg-12 border_seperator">
                            <div class="mvg-card about_mvg-card">
                                <div class="row">
                                    <div class="col-lg-4 {{ $key % 2 == 0 ? 'order-2' : '' }}  ">
                                        <div class="mvg-images">
                                            <img src="{{ asset('storage/' . $mvg->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 {{ $key % 2 == 0 ? 'order-1 text-end' : '' }}">

                                        {{-- <p class="mvg-num">01</p> --}}
                                        <h4 class="mvg-title">
                                            {{ $mvg->{'title_' . app()->getLocale()} ?: $mvg->title_en }}</h4>
                                        <b> {{ $mvg->{'subtitle_' . app()->getLocale()} ?: $mvg->subtitle_en }}</b>
                                        <div class="mvg-text">
                                            {!! $mvg->{'description_' . app()->getLocale()} ?: $mvg->description_en !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    <!-- ══════════════ company Goal ══════════════ -->
    @if ($companyGoal !== null)
        <section class="banner-section" id="about_banner_section"
            style='background-image:url("{{ asset('storage/' . $companyGoal->image) }}")'>
            <div class="container position-relative" style="z-index:2;">
                <div class="row align-items-center">
                    <div class="col-lg-9 m-auto text-center">
                        <span class="built-badge">
                            {{ $companyGoal->{'badge_title_' . app()->getLocale()} ?: $companyGoal->badge_title_en }}</span>
                        <h2 class="banner-title">
                            {{ $companyGoal->{'description_' . app()->getLocale()} ?: $companyGoal->description_en }}
                        </h2>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($testimonials->count() > 0)
        <section id="testimonial_customer_says" class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="text-primary-blue fw-bold small">
                        {{ app()->getLocale() == 'ne' ? 'प्रतिक्रिया' : 'TESTIMONAILS' }}</span>
                    <h2 class="fw-bold text-navy mt-1">
                        {{ app()->getLocale() == 'ne' ? 'हाम्रा नेतृत्वकर्ताहरू के भन्छन्!' : 'What Our Leaders Say!' }}
                    </h2>
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
                            @foreach ($testimonials as $key => $testimonial)
                                <div class="tc-item" data-index="{{ $key }}">
                                    <a class="tc-avatar"><img src="{{ asset('storage/' . $testimonial->image) }}"
                                            alt="Sophia Lee"></a>
                                    <div class="tc-meta">
                                        <p class="tc-name">
                                            {{ $testimonial->{'name_' . app()->getLocale()} ?: $testimonial->name_en }}</p>
                                        <p class="tc-role">
                                            {{ $testimonial->{'designation_' . app()->getLocale()} ?: $testimonial->designation_en }}
                                        </p>
                                    </div>
                                    <div class="tc-desc" hidden="">
                                        {!! $testimonial->{'description_' . app()->getLocale()} ?: $testimonial->description_en !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
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
