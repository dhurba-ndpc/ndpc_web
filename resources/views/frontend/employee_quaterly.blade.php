@extends('frontend.layout.main')

@section('content')
 @include('frontend.partials.menu_head_banner', ['menu' => $menu])

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

                                            {{ $list->{'employee_quarter_title_' . app()->getLocale()} ?? $list->employee_quarter_title_en ?? '' }}
                                        </p>

                                        <!-- Avatar -->
                                        <div class="eq-avatar-wrap">
                                            <img src="{{ asset('storage/' . $list->image) }}" />
                                        </div>

                                        <!-- Name -->
                                        <p class="eq-name">
                                            {{ $list->{'name_' . app()->getLocale()} ?? $list->name_en ?? '' }}
                                        </p>

                                        <!-- Role -->
                                        <p class="eq-role">
                                            <i class="bi bi-briefcase-fill me-1"></i>
                                            {{ $list->{'designation_' . app()->getLocale()} ?? $list->designation_en ?? '' }}
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
                                            {!! $list->{'description_' . app()->getLocale()} ?? $list->description_en ?? '' !!}
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
            const carousel = document.querySelector('.employee_quarter_tcl');
            const source = document.getElementById('tcSource');

            if (!carousel || !source) {
                console.warn('Employee quarter carousel: required elements missing.');
                return;
            }

            const items = Array.from(source.querySelectorAll('.tc-item'));

            if (!items.length) {
                console.warn('No .tc-item elements found inside #tcSource.');
                return;
            }

            const wrap = (i, len) => (i % len + len) % len;

            const slotPrev = carousel.querySelector('#slotPrev');
            const slotCenter = carousel.querySelector('#slotCenter');
            const slotNext = carousel.querySelector('#slotNext');

            const prevBtn = carousel.querySelector('.tc-prev');
            const nextBtn = carousel.querySelector('.tc-next');

            if (!slotPrev || !slotCenter || !slotNext || !prevBtn || !nextBtn) {
                console.warn('Employee quarter carousel: required controls missing.');
                return;
            }

            const nav = carousel.querySelector('.tc-nav');
            const canSlide = items.length > 1;
            let current = items.length >= 3 ? 1 : 0;

            if (nav) {
                nav.hidden = !canSlide;
            }

            function setSlot(slotEl, visible) {
                slotEl.innerHTML = '';
                slotEl.classList.toggle('is-hidden', !visible);
            }

            function cloneInto(slotEl, itemIdx, isActive = false, makeFocusable = false) {
                const clone = items[itemIdx].cloneNode(true);

                clone.classList.remove('active');

                if (isActive) {
                    clone.classList.add('active');
                }

                const avatar = clone.querySelector('.tc-avatar_quater');

                if (avatar && canSlide) {
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

                if (makeFocusable && avatar && canSlide) {
                    requestAnimationFrame(() => {
                        avatar.focus({
                            preventScroll: true
                        });
                    });
                }
            }

            function render(centerIdx) {

                if (!items.length) return;

                current = canSlide ? wrap(centerIdx, items.length) : 0;

                if (items.length === 1) {
                    setSlot(slotPrev, false);
                    setSlot(slotCenter, true);
                    setSlot(slotNext, false);
                    cloneInto(slotCenter, 0, true, false);
                    return;
                }

                if (items.length === 2) {
                    const nextIdx = wrap(current + 1, items.length);

                    setSlot(slotPrev, false);
                    setSlot(slotCenter, true);
                    setSlot(slotNext, true);
                    cloneInto(slotCenter, current, true, false);
                    cloneInto(slotNext, nextIdx, false, false);
                    return;
                }

                const prevIdx = wrap(current - 1, items.length);
                const nextIdx = wrap(current + 1, items.length);

                setSlot(slotPrev, true);
                setSlot(slotCenter, true);
                setSlot(slotNext, true);
                cloneInto(slotPrev, prevIdx, false);
                cloneInto(slotCenter, current, true, true);
                cloneInto(slotNext, nextIdx, false);
            }

            if (canSlide) {
                prevBtn.addEventListener('click', () => render(current - 1));
                nextBtn.addEventListener('click', () => render(current + 1));
            }

            document.addEventListener('keydown', (e) => {
                if (!canSlide) return;

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
