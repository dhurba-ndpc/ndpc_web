<nav class="navbar navbar-expand-lg" id="navbar_overlay">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="white_logo" src="{{ asset('frontend/images/logo_white.png') }}" alt="">
            <img class="dark_logo" src="{{ asset('frontend/images/logo_dark.png') }}" alt="" style="display: none;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item"><a class="nav-link active  pill-trace" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Our Product</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Notices</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Press Releases</a></li>
                        <li><a class="dropdown-item" href="#">Circulars</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">News/Blogs</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Career</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Open Positions</a></li>
                        <li><a class="dropdown-item" href="#">Internship</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
            <a href="#" class="nav-link btn-touch ms-2">Get In Touch <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
    // Navbar active link animation out of the box
    (() => {
        const OUTSET = 3; // outside distance
        const THICK = 2.5; // stroke width
        const SEG = 42; // segment length (px)
        const LAP = 3600; // ms per lap

        function roundedPath(w, h, r) {
            r = Math.max(0, Math.min(r, Math.min(w, h) / 2));
            const x0 = 0,
                y0 = 0,
                x1 = w,
                y1 = h;
            return `M ${x0+r},${y0} H ${x1-r} A ${r},${r} 0 0 1 ${x1},${y0+r} V ${y1-r} A ${r},${r} 0 0 1 ${x1-r},${y1} H ${x0+r} A ${r},${r} 0 0 1 ${x0},${y1-r} V ${y0+r} A ${r},${r} 0 0 1 ${x0+r},${y0} Z`;
        }

        function mount(link) {
            const ns = 'http://www.w3.org/2000/svg';
            const svg = document.createElementNS(ns, 'svg');
            svg.classList.add('pill-trace-svg');

            const path = document.createElementNS(ns, 'path');
            path.classList.add('pill-path');

            const stroke = document.createElementNS(ns, 'path');
            stroke.classList.add('pill-stroke');

            svg.append(path, stroke);
            link.appendChild(svg);

            function layout() {
                const w = link.offsetWidth,
                    h = link.offsetHeight;
                svg.style.inset = `-${OUTSET}px`;
                svg.style.width = `${w + OUTSET*2}px`;
                svg.style.height = `${h + OUTSET*2}px`;

                const cs = getComputedStyle(link);
                const r = Math.max(
                    parseFloat(cs.borderTopLeftRadius) || 0,
                    parseFloat(cs.borderTopRightRadius) || 0,
                    parseFloat(cs.borderBottomRightRadius) || 0,
                    parseFloat(cs.borderBottomLeftRadius) || 0
                ) + OUTSET;

                const pw = w + OUTSET * 2,
                    ph = h + OUTSET * 2;
                const d = roundedPath(pw, ph, Math.min(r, Math.min(pw, ph) / 2));
                path.setAttribute('d', d);
                stroke.setAttribute('d', d);
                stroke.setAttribute('stroke-width', THICK);

                const len = stroke.getTotalLength();
                // segment + gap pattern; tiny epsilon prevents “wrap blip”
                const gap = Math.max(1, len - SEG) + 0.1;
                stroke.style.setProperty('--lap', LAP + 'ms');
                stroke.style.setProperty('--negLen', -len);

                stroke.setAttribute('stroke-dasharray', `${SEG} ${gap}`);
                stroke.setAttribute('stroke-dashoffset', '0');
            }

            const ro = new ResizeObserver(layout);
            ro.observe(link);
            layout();
        }

        document.querySelectorAll('.pill-trace').forEach(mount);
    })();
</script>

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
