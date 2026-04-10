<nav class="navbar navbar-expand-lg" id="navbar_overlay">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="white_logo" src="{{ asset('frontend/images/logo_white.png') }}" alt="">
            <img class="dark_logo" src="{{ asset('frontend/images/logo_dark.png') }}" alt="" style="display: none;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('product') }}">Our Product</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Notices</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('notice') }}">Press Releases</a></li>
                        <li><a class="dropdown-item" href="{{ url('report') }}">Reports</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('blogs') }}">News/Blogs</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Career</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Open Positions</a></li>
                        <li><a class="dropdown-item" href="#">Internship</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
            </ul>
            <a href="#" class="nav-link btn-touch ms-2">Get In Touch <i class="bi bi-arrow-right"></i></a>
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
