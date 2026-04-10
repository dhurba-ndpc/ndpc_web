@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Contact Us</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our company! We are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Contact Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact_page_wrapper">
        <div class="container">
            <div class="inner_contact_background_wrapper">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="contact_detial_wrapper">
                            <div class="contact_header_wrapper">
                                <h2 class="text_gradient_header"><u>Connect with us</u></h2>
                                <p>Experience the future of seamless transactions. Corporate Nepal offers secure, instant,
                                    and reliable digital payment solutions tailored for your business growth. Go cashless
                                    today!</p>
                            </div>
                            <div class="contact_detail_wrapper">
                                <h3>Office Address</h3>
                                <ul>
                                    <li><span class="bi bi-send-fill"></span>
                                        Tripureshwor, Kathmandu, Nepal
                                    </li>
                                    <li><span class="bi bi-telephone-fill"></span>
                                        +977-1-4117100, +977-1-4117200
                                    </li>
                                    <li> 
                                        <span class="bi bi-phone-fill"></span>
                                        +977-9800000000
                                    </li>
                                    <li>
                                        <span class="bi bi-geo-alt-fill"></span>
                                        4416
                                    </li>
                                </ul>
                            </div>
                            <div class="google_map_wrapper">
                                <iframe src="https://maps.app.goo.gl/uETjPQZ8PgnUrvWW8" frameborder="0"></iframe>
                            </div>
                            <div class="social_icon_wrapper">
                                <div class="text_label">
                                    <h3>Get In Touch With Us:</h3>
                                </div>
                                <div class="social_icon_list">
                                    <ul>
                                        <li>
                                            <a href="  "><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="  "><i class="bi bi-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="  "><i class="bi bi-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="  "><i class="bi bi-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact_form_wrapper">
                            <form action=" " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}"
                                        placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="name@example.com">

                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone') }}"
                                        placeholder="+977-9800000000">

                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea placeholder="Write Message" class="form-control @error('message') is-invalid @enderror" id="message"
                                        rows="3" name="message" value="{{ old('message') }}"></textarea>

                                </div>
                                <div class="mb-3 google_captcha_placeholder text-center">
                                    Captcha Placeholder
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-contact">Send Message &nbsp;
                                        <span class="bi bi-send-fill"></span>
                                    </button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
    </section>
@endsection
