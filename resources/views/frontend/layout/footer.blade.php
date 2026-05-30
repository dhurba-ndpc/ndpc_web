<!-- ══════════════ FOOTER ══════════════ -->
<footer>
    <div class="container">
        <div class="row">
            <!-- Col 1 – Logo + Contact -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-logo mb-3">
                    <img src="{{ asset('storage/' . ($site_setting_details->logo_2 ?? '')) }}" alt="">
                </div>
                <div class="footer_info">
                    <p>

                        {{ $site_setting_details->{'footer_short_description_' . app()->getLocale()} ?: $site_setting_details->footer_short_description_en }}
                    </p>
                </div>
                <div class="footer-contact">
                    <p><i class="bi bi-telephone-fill"></i>
                        {{ $site_setting_details->phone_1 ?? '' }} &nbsp;
                        {{ $site_setting_details->phone_2 ?? '' }}
                    </p>
                    <p><i class="bi bi-geo-alt-fill"></i> {!! $site_setting_details->{'address_' . app()->getLocale()} ?: $site_setting_details->address_en !!}</p>
                    <p><i class="bi bi-envelope-fill"></i> {{ $site_setting_details->email ?? '' }}</p>
                </div>
            </div>

            <!-- Col 2 – Company Links -->
            @if ($footerMenus->count() > 0)
                <div class="col-lg-2 col-md-3 col-6 offset-lg-1">
                    <h6 class="footer-heading">{{ app()->getLocale() == 'ne' ? 'कम्पनी' : 'Company' }}</h6>
                    <ul class="footer-links">
                        @foreach ($footerMenus->where('is_active', true) as $menu)
                            <li>
                                <a class="{{ isActiveParentMenu($menu) }}"
                                    @if (!empty($menu->external_link)) href="{{ $menu->external_link }}"
                                @elseif ($menu->page_template == 'default-page')
                                   
                                    href="{{ route('defaultPage', $menu->slug) }}"
                                @else
                                    href="{{ route('pageTemplate', $menu->page_template) }}" @endif>
                                    {{ $menu->{'menu_name_' . app()->getLocale()} ?: $menu->menu_name_en }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Col 3 – Useful Links -->
            @if ($UsefulLinksMenu->count() > 0)
                <div class="col-lg-2 col-md-3 col-6">
                    <h6 class="footer-heading">{{ app()->getLocale() == 'ne' ? 'उपयोगी लिङ्कहरू' : 'Useful Links' }}
                    </h6>
                    <ul class="footer-links">
                        @foreach ($UsefulLinksMenu->where('is_active', true) as $menu)
                            <li>
                                <a class="{{ isActiveParentMenu($menu) }}"
                                    @if (!empty($menu->external_link)) href="{{ $menu->external_link }}"
                                @elseif ($menu->page_template == 'default-page')
                                   
                                    href="{{ route('defaultPage', $menu->slug) }}"
                                @else
                                    href="{{ route('pageTemplate', $menu->page_template) }}" @endif>
                                    {{ $menu->{'menu_name_' . app()->getLocale()} ?: $menu->menu_name_en }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Col 4 – Information Officer -->
            <div class="col-lg-4 col-md-6">
                <h6 class="footer-heading">
                    {{ app()->getLocale() == 'ne' ? 'सूचना अधिकारी / प्रवक्ता' : 'Information Officer / Spokesperson' }}
                </h6>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img class="officer-img" src="{{ asset('storage/' . ($site_setting_details->image ?? '')) }}"
                        alt="Information Officer">
                    <div class="footer-officer">
                        <p style="color:#fff;font-weight:600;">
                            {{ $site_setting_details->{'information_officer_name_' . app()->getLocale()} ?: $site_setting_details->information_officer_name_en }}
                        </p>
                        <p>Contact no: {{ $site_setting_details->information_officer_contact_no ?? '' }}</p>
                        <p>Email: {{ $site_setting_details->information_officer_email ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>2024 -
                <script>
                    document.write(new Date().getFullYear())
                </script>&nbsp; &copy; All rights reserved. Nepal Digital Payment Company Ltd. (NDPC)
            </p>
            <div class="social-icons">
                <a href="{{$site_setting_details->facebook_link ?? ''}}"><i class="bi bi-facebook"></i></a>
                <a href="{{$site_setting_details->instagram_link ?? ''}}"><i class="bi bi-instagram"></i></a>
                <a href="{{$site_setting_details->linkedin_link ?? ''}}"><i class="bi bi-linkedin"></i></a>
                <a href="{{$site_setting_details->youtube_link ?? ''}}"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- Floating Action Button -->
<a href="#" class="fab-btn"><i class="bi bi-arrow-up"></i></a>
<script>
    window.addEventListener('scroll', function() {
        const scrollBtn = document.querySelector('.fab-btn');

        // If we scroll down more than 200px from the top
        if (window.scrollY > 200) {
            scrollBtn.classList.add('show');
        } else {
            scrollBtn.classList.remove('show');
        }
    });

    // Optional: Smooth scroll to top when clicked
    document.querySelector('.fab-btn').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
