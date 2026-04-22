@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Organization Chart</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our blogs! Here you will find the latest news and updates from our team. We
                                    are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Organization Chart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="default_page_wrapper" style="background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('frontend/images/organization.png') }}" alt="Organization Chart" style="max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                </div>
            </div>
        </div>
    </section>
@endsection
