@extends('frontend.layout.main')

@section('content')
 @include('frontend.partials.menu_head_banner', ['menu' => $menu])
    <section id="contact_page_wrapper">
        <div class="container">
            <div class="inner_contact_background_wrapper">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="contact_detial_wrapper">
                            <div class="contact_header_wrapper">
                                <h1 class="section-title mb-3">{!! app()->getLocale() == 'ne' ? 'हामीसँग <span>जोडिनुहोस्।</span>' : 'Connect<span>&nbsp;With Us</span>' !!}</h1>
                                <p>
                                    {!! $site_setting_details->{'connect_short_message_' . app()->getLocale()} ??
                                        $site_setting_details->connect_short_message_en ?? '' !!}
                                </p>
                            </div>
                            <div class="contact_detail_wrapper">
                                <h3>{{ app()->getLocale() == 'ne' ? 'कार्यालय ठेगाना' : 'Office Address' }}</h3>
                                <ul>
                                    @if(!empty($site_setting_details->{'address_' . app()->getLocale()} ?? $site_setting_details->address_en ?? ''))
                                    <li><span class="bi bi-send-fill"></span>
                                        {!! $site_setting_details->{'address_' . app()->getLocale()} ?? $site_setting_details->address_en ?? '' !!}
                                    </li>
                                    @endif
                                    @if(!empty($site_setting_details->phone_1) || !empty($site_setting_details->phone_2))
                                    <li><span class="bi bi-telephone-fill"></span>
                                        {{ $site_setting_details->phone_1 ?? '' }} &nbsp;
                                        {{ $site_setting_details->phone_2 ?? '' }}
                                    </li>
                                    @endif
                                    @if(!empty($site_setting_details->mobile_no_1) || !empty($site_setting_details->mobile_no_2))
                                    <li>
                                        <span class="bi bi-phone-fill"></span>
                                        {{ $site_setting_details->mobile_no_1 ?? '' }} &nbsp;
                                        {{ $site_setting_details->mobile_no_2 ?? '' }}
                                    </li>
                                    @endif
                                    @if(!empty($site_setting_details->zipcode))
                                    <li>
                                        <span class="bi bi-geo-alt-fill"></span>
                                        {{ $site_setting_details->zipcode ?? '' }}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="google_map_wrapper">
                                {!! $site_setting_details->google_map ?? '' !!}
                            </div>
                            @if(!empty($site_setting_details->facebook_link) || !empty($site_setting_details->instagram_link) || !empty($site_setting_details->linkedin_link) || !empty($site_setting_details->youtube_link))
                            <div class="social_icon_wrapper">
                                <div class="text_label">
                                    <h3>{{ app()->getLocale() == 'ne' ? 'हामीलाई सम्पर्क गर्नुहोस्' : 'Get In Touch With Us' }}:
                                    </h3>
                                </div>
                                <div class="social_icon_list">
                                    <ul>
                                        <li>
                                            <a href="{{ $site_setting_details->facebook_link ?? '' }}"><i
                                                    class="bi bi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $site_setting_details->instagram_link ?? '' }}"><i
                                                    class="bi bi-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $site_setting_details->linkedin_link ?? '' }}"><i
                                                    class="bi bi-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $site_setting_details->youtube_link ?? '' }}"><i
                                                    class="bi bi-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact_form_wrapper">
                            @if (session('success'))
                                <div class="mb-4" role="status">
                                    <div class="d-flex align-items-start gap-2">
                                        <span class="bi bi-check-circle-fill text-success" style="font-size: 1.15rem;"></span>
                                        <div>
                                            <strong style="color: var(--dark);">{{ app()->getLocale() == 'ne' ? 'सन्देश पठाइयो' : 'Message sent successfully' }}</strong>
                                            <div class="small mt-1" style="color: var(--text-mid);">{{ session('success') }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <form action="{{ route('contact-message.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ app()->getLocale() == 'ne' ? 'नाम' : 'Name' }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}"
                                        placeholder="{{ app()->getLocale() == 'ne' ? 'तपाईंको नाम लेख्नुहोस्' : 'Enter your name' }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ app()->getLocale() == 'ne' ? 'इमेल' : 'Email' }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="name@example.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">{{ app()->getLocale() == 'ne' ? 'फोन' : 'Phone' }}</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone') }}"
                                        placeholder="+977-9800000000">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">{{ app()->getLocale() == 'ne' ? 'सन्देश' : 'Message' }}</label>
                                    <textarea placeholder="Write Message" class="form-control @error('message') is-invalid @enderror" id="message"
                                        rows="4" name="message">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 google_captcha_placeholder text-center">
                                    Captcha Placeholder
                                </div>

                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-contact">{{ app()->getLocale() == 'ne' ? 'सन्देश पठाउनुहोस्' : 'Send Message' }} &nbsp;
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
