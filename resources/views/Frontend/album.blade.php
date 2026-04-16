@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Albums</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our company! We are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Albums</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="album_wrapper" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="album-card">
                        <div class="album-thumb">
                            <img src="{{ asset('frontend/images/a2.jpg') }}" alt="Album thumbnail">
                        </div>
                        <div class="album-card-body">
                            <span class="album-label">Album</span>
                            <h5 class="album-title">NDPC Photo Gallery</h5>
                            <p class="album-text">Explore our latest events, team moments, and company highlights.</p>
                            <a href="{{ url('gallery')}}" class="btn-album">Open Gallery <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="album-card">
                        <div class="album-thumb">
                            <img src="{{ asset('frontend/images/Access2Finance.jpg') }}" alt="Album thumbnail">
                        </div>
                        <div class="album-card-body">
                            <span class="album-label">Album</span>
                            <h5 class="album-title">NDPC Photo Gallery</h5>
                            <p class="album-text">Explore our latest events, team moments, and company highlights.</p>
                            <a href="{{ url('gallery')}}" class="btn-album">Open Gallery <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="album-card">
                        <div class="album-thumb">
                            <img src="{{ asset('frontend/images/background1.jpg') }}" alt="Album thumbnail">
                        </div>
                        <div class="album-card-body">
                            <span class="album-label">Album</span>
                            <h5 class="album-title">NDPC Photo Gallery</h5>
                            <p class="album-text">Explore our latest events, team moments, and company highlights.</p>
                            <a href="{{ url('gallery')}}" class="btn-album">Open Gallery <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="album-card">
                        <div class="album-thumb">
                            <img src="{{ asset('frontend/images/Mission.jpg') }}" alt="Album thumbnail">
                        </div>
                        <div class="album-card-body">
                            <span class="album-label">Album</span>
                            <h5 class="album-title">NDPC Photo Gallery</h5>
                            <p class="album-text">Explore our latest events, team moments, and company highlights.</p>
                            <a href="{{ url('gallery')}}" class="btn-album">Open Gallery <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
