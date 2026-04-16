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
                            {{-- <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our company! We are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div> --}}
                            {{-- <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Contact Us</span>
                            </div> --}}
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
                                <h1 class="section-title mb-3">Connect<span>&nbsp;With Us</span></h1>
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
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.6564078069805!2d85.3135884!3d27.6970125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a6b438f1b5%3A0x96ee929f5203636b!2sNepal%20Digital%20Payments%20Company!5e0!3m2!1sen!2snp!4v1776232517895!5m2!1sen!2snp"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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

                                <div class="mb-3 text-center">
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
