@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Gallery</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our company! We are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Gallery</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section id="gallery_page_wrapper" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="gallery-card">
                        <div class="gallery-card-body">
                            <h4 class="gallery-card-title">Photo Gallery of Album "A"</h4>
                            <p class="gallery-card-text">Click any thumbnail to open the images in a lightbox.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="gallery-card">
                        <a href="{{ asset('frontend/images/a2.jpg') }}" data-lightbox="roadtrip" class="gallery-thumb-link">
                            <img src="{{ asset('frontend/images/a2.jpg') }}" alt="Gallery image 1">
                        </a>
                        <div class="gallery-thumb-title">Image #1</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="gallery-card">
                        <a href="{{ asset('frontend/images/background1.jpg') }}" data-lightbox="roadtrip" class="gallery-thumb-link">
                            <img src="{{ asset('frontend/images/background1.jpg') }}" alt="Gallery image 2">
                        </a>
                        <div class="gallery-thumb-title">Image #2</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="gallery-card">
                        <a href="{{ asset('frontend/images/Goal.jpg') }}" data-lightbox="roadtrip" class="gallery-thumb-link">
                            <img src="{{ asset('frontend/images/Goal.jpg') }}" alt="Gallery image 3">
                        </a>
                        <div class="gallery-thumb-title">Image #3</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="gallery-card">
                        <a href="{{ asset('frontend/images/Mission.jpg') }}" data-lightbox="roadtrip" class="gallery-thumb-link">
                            <img src="{{ asset('frontend/images/Mission.jpg') }}" alt="Gallery image 4">
                        </a>
                        <div class="gallery-thumb-title">Image #4</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="gallery-card">
                        <a href="{{ asset('frontend/images/Mission.jpg') }}" data-lightbox="roadtrip" class="gallery-thumb-link">
                            <img src="{{ asset('frontend/images/Mission.jpg') }}" alt="Gallery image 4">
                        </a>
                        <div class="gallery-thumb-title">Image #4</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="gallery-card">
                        <a href="{{ asset('frontend/images/Mission.jpg') }}" data-lightbox="roadtrip" class="gallery-thumb-link">
                            <img src="{{ asset('frontend/images/Mission.jpg') }}" alt="Gallery image 4">
                        </a>
                        <div class="gallery-thumb-title">Image #4</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="gallery-card">
                        <a href="{{ asset('frontend/images/Mission.jpg') }}" data-lightbox="roadtrip" class="gallery-thumb-link">
                            <img src="{{ asset('frontend/images/Mission.jpg') }}" alt="Gallery image 4">
                        </a>
                        <div class="gallery-thumb-title">Image #4</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="gallery-card">
                        <a href="{{ asset('frontend/images/Mission.jpg') }}" data-lightbox="roadtrip" class="gallery-thumb-link">
                            <img src="{{ asset('frontend/images/Mission.jpg') }}" alt="Gallery image 4">
                        </a>
                        <div class="gallery-thumb-title">Image #4</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>
@endpush
