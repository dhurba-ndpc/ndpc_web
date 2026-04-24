<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Namaste Pay – Empowering a Digital Nepal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/ndpc-cleaned.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/ndpc-responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/plugins/OwlCarousel2-2.3.4/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/plugins/OwlCarousel2-2.3.4/owl.theme.default.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/lightbox2-2.12.0/dist/css/lightbox.min.css') }}">
    {{-- favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('frontend/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('frontend/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('frontend/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('frontend/favicon/site.webmanifest') }}" />
    {{-- favicon --}}
</head>

<body>
    @include('frontend.layout.navbar')

    @yield('content')

    @include('frontend.layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="{{ asset('frontend/plugins/OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/lightbox2-2.12.0/dist/js/lightbox.min.js') }}"></script>
    @stack('scripts')
   
</body>

</html>
