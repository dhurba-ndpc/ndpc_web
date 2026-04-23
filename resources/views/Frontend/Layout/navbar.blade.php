<nav class="navbar navbar-expand-lg" id="navbar_overlay">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="white_logo" src="{{ asset('frontend/images/logo_white.png') }}" alt="">
            <img class="dark_logo" src="{{ asset('frontend/images/logo_dark.png') }}" alt=""
                style="display: none;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                        href="{{ url('/') }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('about', 'member', 'employee-quaterly', 'page') ? 'active' : '' }}"
                        href="#" data-bs-toggle="dropdown">
                        About
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ Request::is('/about') ? 'active' : '' }}"
                                href="{{ url('about') }}">About Us</a></li>
                        <li><a class="dropdown-item {{ Request::is('/member') ? 'active' : '' }}"
                                href="{{ url('member') }}">Members</a></li>
                        <li><a class="dropdown-item {{ Request::is('/employee-quaterly') ? 'active' : '' }}"
                                href="{{ url('employee-quaterly') }}">Employee Quarterly</a></li>
                        <li><a class="dropdown-item {{ Request::is('/page') ? 'active' : '' }}"
                                href="{{ url('page') }}">Organization Chart</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{ Request::is('product') ? 'active' : '' }}"
                        href="{{ url('product') }}">Our Product</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('notice') || Request::is('report') ? 'active' : '' }}"
                        href="#" data-bs-toggle="dropdown">Notices</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ Request::is('notice') ? 'active' : '' }}"
                                href="{{ url('notice') }}">Press Releases</a></li>
                        <li><a class="dropdown-item {{ Request::is('report') ? 'active' : '' }}"
                                href="{{ url('report') }}">Reports</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{ Request::is('blogs') ? 'active' : '' }}"
                        href="{{ url('blogs') }}">News/Blogs</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('vacancy*') || request()->is('vacancy-result*') ? 'active' : '' }}"
                        href="#" data-bs-toggle="dropdown">Career</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->is('vacancy') ? 'active' : '' }}"
                                href="{{ url('vacancy') }}">Open Positions</a></li>
                        <li><a class="dropdown-item {{ request()->is('vacancy-result') ? 'active' : '' }}"
                                href="{{ url('vacancy-result') }}">Vacancy Results</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{ Request::is('album') ? 'active' : '' }}"
                        href="{{ url('album') }}">Album</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                        href="{{ url('contact') }}">Contact</a></li>
            </ul>
            <a href="#" class="nav-link btn-touch ms-2">NE <i class="bi bi-translate"></i></a>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var navbar = $("#navbar_overlay");

            if (scroll >= 50) {
                navbar.addClass("scrolled_nav");
                // Use the navbar variable to find children regardless of the current class
                navbar.find('.white_logo').hide();
                navbar.find('.dark_logo').show();
            } else {
                navbar.removeClass("scrolled_nav");
                navbar.find('.white_logo').show();
                navbar.find('.dark_logo').hide();
            }
        });
    </script>
@endpush
