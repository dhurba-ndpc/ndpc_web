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

    <section id="employee_quater_wrapper">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tcl employee_quarter_tcl" role="region" aria-label="Testimonials">
                        <!-- LEFT: fixed slots -->
                        <div class="custom_employee_quater_slider_wrapper">

                            <div class="tc-stack">
                                <div id="slotPrev" class="tc-slot prev"></div>
                                <div id="slotCenter" class="tc-slot center"></div>
                                <div id="slotNext" class="tc-slot next"></div>
                            </div>
                            <div class="tc-nav">
                                <button class="tc-btn tc-prev" aria-label="Previous"><i
                                        class="bi bi-arrow-left"></i></button>
                                <button class="tc-btn tc-next" aria-label="Next"><i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                    @php
                        $adYear = date('Y');
                        $adMonth = date('n');

                        // Approx BS year without package
                        $currentBsYear = $adMonth >= 3 ? $adYear + 57 : $adYear + 56;

                        // Approx BS month without package
                        $bsMonthMap = [
                            1 => 10,
                            2 => 11,
                            3 => 12,
                            4 => 1,
                            5 => 2,
                            6 => 3,
                            7 => 4,
                            8 => 5,
                            9 => 6,
                            10 => 7,
                            11 => 8,
                            12 => 9,
                        ];
                        $currentBsMonth = $bsMonthMap[$adMonth];
                        echo $currentBsMonth;
                        // 1-3 = Q1, 4-6 = Q2, 7-9 = Q3, 10-12 = Q4
                        $currentQuarter = ceil($currentBsMonth / 3);
                    @endphp
                    <div id="tcSource" hidden="">
                        @foreach ($employee_quaters as $key => $list)
                            <div class="tc-item" data-index="{{ $key }}">
                                <a class="tc-avatar_quater">
                                    <div class="employee_quarter">

                                        <!-- decorative corner icons -->
                                        <i class="bi bi-graph-up-arrow eq-corner eq-corner-tl"></i>
                                        <i class="bi bi-people-fill eq-corner eq-corner-br"></i>

                                        <!-- Heading -->
                                        <p class="eq-title">
                                            <i class="bi bi-trophy-fill me-1" style="color:#f5c842 !important;"></i>
                                            {{ $list->{'employee_quarter_title_' . app()->getLocale()} ?: $list->employee_quarter_title_en }}
                                        </p>

                                        <!-- Avatar -->
                                        <div class="eq-avatar-wrap">
                                            <img src="{{ asset('storage/' . $list->image) }}" />
                                        </div>

                                        <!-- Name -->
                                        <p class="eq-name">
                                            {{ $list->{'name_' . app()->getLocale()} ?: $list->name_en }}
                                        </p>

                                        <!-- Role -->
                                        <p class="eq-role">
                                            <i class="bi bi-briefcase-fill me-1"></i>
                                            {{ $list->{'designation_' . app()->getLocale()} ?: $list->designation_en }}
                                        </p>

                                        <!-- Quarter badge -->
                                        <div class="eq-quarter">
                                            <i class="bi bi-pie-chart-fill"></i>
                                            Quarter {{ $list->quarter }} &nbsp;(
                                            {{ $list->year }}/{{ substr($list->year + 1, -2) }} )
                                        </div>

                                        <hr class="eq-divider" />

                                        <!-- Message -->
                                        <div class="eq-message">
                                            {!! $list->{'description_' . app()->getLocale()} ?: $list->description_en !!}
                                        </div>

                                    </div>
                                </a>


                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

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

            const wrap = (i, len) => (i % len + len) % len;

            const slotPrev = document.getElementById('slotPrev');
            const slotCenter = document.getElementById('slotCenter');
            const slotNext = document.getElementById('slotNext');

            const prevBtn = document.querySelector('.tc-prev');
            const nextBtn = document.querySelector('.tc-next');

            if (!slotPrev || !slotCenter || !slotNext || !prevBtn || !nextBtn) {
                console.warn('Testimonial carousel: required elements missing.');
                return;
            }

            let current = items.length >= 3 ? 1 : 0;

            function cloneInto(slotEl, itemIdx, isActive = false, makeFocusable = false) {

                slotEl.innerHTML = '';

                const clone = items[itemIdx].cloneNode(true);

                // remove old active class first
                clone.classList.remove('active');

                // add active class only to center item
                if (isActive) {
                    clone.classList.add('active');
                }

                const avatar = clone.querySelector('.tc-avatar_quater');

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

                // prev
                cloneInto(slotPrev, prevIdx, false);

                // center with active class
                cloneInto(slotCenter, current, true, true);

                // next
                cloneInto(slotNext, nextIdx, false);

                const desc = items[current].querySelector('.tc-desc');

                if (quoteEl) {
                    quoteEl.textContent = desc ? desc.textContent.trim() : '';
                }
            }

            prevBtn.addEventListener('click', () => render(current - 1));

            nextBtn.addEventListener('click', () => render(current + 1));

            document.addEventListener('keydown', (e) => {

                if (e.key === 'ArrowRight') {
                    render(current + 1);
                }

                if (e.key === 'ArrowLeft') {
                    render(current - 1);
                }

            });

            render(current);

        });
    </script>
@endpush
