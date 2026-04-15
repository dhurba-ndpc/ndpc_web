@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Employee of the Quarter</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our company! We are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Employee of the Quarter</span>
                            </div>
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
                    <div id="tcSource" hidden="">

                        <div class="tc-item" data-index="0">
                            <a class="tc-avatar_quater">
                                <div class="employee_quarter">

                                    <!-- decorative corner icons -->
                                    <i class="bi bi-graph-up-arrow eq-corner eq-corner-tl"></i>
                                    <i class="bi bi-people-fill eq-corner eq-corner-br"></i>

                                    <!-- Heading -->
                                    <p class="eq-title">
                                        <i class="bi bi-trophy-fill me-1" style="color:#f5c842 !important;"></i>
                                        Employee of the Quarter
                                    </p>

                                    <!-- Avatar -->
                                    <div class="eq-avatar-wrap">
                                        <img src="{{ asset('frontend/images/PrakashBhandari.jpg') }}" />
                                    </div>

                                    <!-- Name -->
                                    <p class="eq-name">NIRAJ KUMAR SAH</p>

                                    <!-- Role -->
                                    <p class="eq-role">
                                        <i class="bi bi-briefcase-fill me-1"></i>Sales Officer
                                    </p>

                                    <!-- Quarter badge -->
                                    <div class="eq-quarter">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Quarter 1 &nbsp;( 2079/80 )
                                    </div>

                                    <hr class="eq-divider" />

                                    <!-- Message -->
                                    <p class="eq-message">
                                        Your dedication is imperative for the growth of the company.<br />
                                        Thank you for your efforts.
                                    </p>

                                </div>
                            </a>


                        </div>
                        <div class="tc-item" data-index="1">
                            <a class="tc-avatar_quater">
                                <div class="employee_quarter">

                                    <!-- decorative corner icons -->
                                    <i class="bi bi-graph-up-arrow eq-corner eq-corner-tl"></i>
                                    <i class="bi bi-people-fill eq-corner eq-corner-br"></i>

                                    <!-- Heading -->
                                    <p class="eq-title">
                                        <i class="bi bi-trophy-fill me-1" style="color:#f5c842 !important;"></i>
                                        Employee of the Quarter
                                    </p>

                                    <!-- Avatar -->
                                    <div class="eq-avatar-wrap">
                                        <img src="{{ asset('frontend/images/PrakashBhandari.jpg') }}" />
                                    </div>

                                    <!-- Name -->
                                    <p class="eq-name">NIRAJ KUMAR SAH</p>

                                    <!-- Role -->
                                    <p class="eq-role">
                                        <i class="bi bi-briefcase-fill me-1"></i>Sales Officer
                                    </p>

                                    <!-- Quarter badge -->
                                    <div class="eq-quarter">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Quarter 1 &nbsp;( 2080/81 )
                                    </div>

                                    <hr class="eq-divider" />

                                    <!-- Message -->
                                    <p class="eq-message">
                                        Your dedication is imperative for the growth of the company.<br />
                                        Thank you for your efforts.
                                    </p>

                                </div>
                            </a>


                        </div>
                        <div class="tc-item" data-index="2">
                            <a class="tc-avatar_quater">
                                <div class="employee_quarter">

                                    <!-- decorative corner icons -->
                                    <i class="bi bi-graph-up-arrow eq-corner eq-corner-tl"></i>
                                    <i class="bi bi-people-fill eq-corner eq-corner-br"></i>

                                    <!-- Heading -->
                                    <p class="eq-title">
                                        <i class="bi bi-trophy-fill me-1" style="color:#f5c842 !important;"></i>
                                        Employee of the Quarter
                                    </p>

                                    <!-- Avatar -->
                                    <div class="eq-avatar-wrap">
                                        <img src="{{ asset('frontend/images/RabinKumarShrestha.png') }}" />
                                    </div>

                                    <!-- Name -->
                                    <p class="eq-name">NIRAJ KUMAR SAH</p>

                                    <!-- Role -->
                                    <p class="eq-role">
                                        <i class="bi bi-briefcase-fill me-1"></i>Sales Officer
                                    </p>

                                    <!-- Quarter badge -->
                                    <div class="eq-quarter">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Quarter 1 &nbsp;( 2081/82 )
                                    </div>

                                    <hr class="eq-divider" />

                                    <!-- Message -->
                                    <p class="eq-message">
                                        Your dedication is imperative for the growth of the company.<br />
                                        Thank you for your efforts.
                                    </p>

                                </div>
                            </a>


                        </div>
                        <div class="tc-item" data-index="3">
                            <a class="tc-avatar_quater">
                                <div class="employee_quarter">

                                    <!-- decorative corner icons -->
                                    <i class="bi bi-graph-up-arrow eq-corner eq-corner-tl"></i>
                                    <i class="bi bi-people-fill eq-corner eq-corner-br"></i>

                                    <!-- Heading -->
                                    <p class="eq-title">
                                        <i class="bi bi-trophy-fill me-1" style="color:#f5c842 !important;"></i>
                                        Employee of the Quarter
                                    </p>

                                    <!-- Avatar -->
                                    <div class="eq-avatar-wrap">
                                        <img src="{{ asset('frontend/images/SanjeebKumarDeo.jpg') }}" />
                                    </div>

                                    <!-- Name -->
                                    <p class="eq-name">NIRAJ KUMAR SAH</p>

                                    <!-- Role -->
                                    <p class="eq-role">
                                        <i class="bi bi-briefcase-fill me-1"></i>Sales Officer
                                    </p>

                                    <!-- Quarter badge -->
                                    <div class="eq-quarter">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Quarter 1 &nbsp;( 2082/83 )
                                    </div>

                                    <hr class="eq-divider" />

                                    <!-- Message -->
                                    <p class="eq-message">
                                        Your dedication is imperative for the growth of the company.<br />
                                        Thank you for your efforts.
                                    </p>

                                </div>
                            </a>


                        </div>
                        <div class="tc-item" data-index="4">
                            <a class="tc-avatar_quater">
                                <div class="employee_quarter">

                                    <!-- decorative corner icons -->
                                    <i class="bi bi-graph-up-arrow eq-corner eq-corner-tl"></i>
                                    <i class="bi bi-people-fill eq-corner eq-corner-br"></i>

                                    <!-- Heading -->
                                    <p class="eq-title">
                                        <i class="bi bi-trophy-fill me-1" style="color:#f5c842 !important;"></i>
                                        Employee of the Quarter
                                    </p>

                                    <!-- Avatar -->
                                    <div class="eq-avatar-wrap">
                                        <img src="{{ asset('frontend/images/ShwetaBagla.jpg') }}" />
                                    </div>

                                    <!-- Name -->
                                    <p class="eq-name">NIRAJ KUMAR SAH</p>

                                    <!-- Role -->
                                    <p class="eq-role">
                                        <i class="bi bi-briefcase-fill me-1"></i>Sales Officer
                                    </p>

                                    <!-- Quarter badge -->
                                    <div class="eq-quarter">
                                        <i class="bi bi-pie-chart-fill"></i>
                                        Quarter 1 &nbsp;( 2082/83 )
                                    </div>

                                    <hr class="eq-divider" />

                                    <!-- Message -->
                                    <p class="eq-message">
                                        Your dedication is imperative for the growth of the company.<br />
                                        Thank you for your efforts.
                                    </p>

                                </div>
                            </a>


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

            const prevBtn = document.querySelector('.tc-prev');
            const nextBtn = document.querySelector('.tc-next');

            if (!slotPrev || !slotCenter || !slotNext || !prevBtn || !nextBtn) {
                console.warn('Testimonial carousel: required elements missing.');
                return;
            }

            // Default center: middle of first three (index 1) if >=3, else 0
            let current = items.length >= 3 ? 1 : 0;

            function cloneInto(slotEl, itemIdx, makeFocusable = false) {
                slotEl.innerHTML = ''; // clear old
                const clone = items[itemIdx].cloneNode(true);

                // Clicking avatar in any slot should re-center to THAT real index
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
