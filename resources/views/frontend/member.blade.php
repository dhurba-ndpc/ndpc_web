@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('storage/' . $menu->image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1> {{ $menu->{'page_title_' . app()->getLocale()} ?: $menu->page_title_en }}</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                {!! $menu->{'description_' . app()->getLocale()} ?: $menu->description_en !!}
                            </div>
                            {{-- <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> About Us</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @if ($board_director->count() > 0)
        <section id="bord_member_photo_wrapper">
            <div class="container">

                <div class="text-center mb-5">
                    <span class="text-primary-blue fw-bold small">
                        {{ app()->getLocale() == 'ne' ? 'हाम्रो बारेमा' : 'ABOUT US' }}</span>
                    <h2 class="fw-bold text-navy mt-1">
                        {{ app()->getLocale() == 'ne' ? 'हाम्रो निर्देशक बोर्ड' : 'Our Board Of Directors' }}</h2>
                </div>
                @foreach ($board_director as $member)
                    @if ($loop->first)
                        <div class="row g-4 mb-5 justify-content-center">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="director-card shadow-sm border-0 text-center h-100">
                                    <div class="p-4 d-flex flex-column h-100">
                                        <div class="avatar-container mb-4">
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="Shobhan Adhikari"
                                                class="avatar-img rounded-circle border border-5 border-white shadow">
                                        </div>
                                        <div class="card-content mt-auto">
                                            <h2 class="h6 mb-2 fw-semibold director-name">
                                                {{ $member->{'name_' . app()->getLocale()} ?: $member->name_en }}
                                            </h2>
                                            <span class="badge bg-primary text-white custom-badge px-3 mb-2 d-inline-block">
                                                {{ $member->{'position_' . app()->getLocale()} ?: $member->position_en }}
                                            </span>
                                            <p class="mb-0 text-muted small organisation-name">
                                                {{ $member->{'organization_involvement_' . app()->getLocale()} ?: $member->organization_involvement_en }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="row g-4 justify-content-center">
                    @foreach ($board_director->skip(1) as $member)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="director-card shadow-sm border-0 text-center h-100">
                                <div class="p-4 d-flex flex-column h-100">
                                    <div class="avatar-container mb-4">
                                        <img src="{{ asset('storage/' . $member->image) }}" alt="Sony Shrestha"
                                            class="avatar-img rounded-circle border border-5 border-white shadow">
                                    </div>
                                    <div class="card-content mt-auto">
                                        <h2 class="h6 mb-2 fw-semibold director-name">
                                            {{ $member->{'name_' . app()->getLocale()} ?: $member->name_en }}</h2>
                                        <span class="badge badge-member text-muted custom-badge px-3 mb-2 d-inline-block">
                                            {{ $member->{'position_' . app()->getLocale()} ?: $member->position_en }}</span>
                                        <p class="mb-0 text-muted small organisation-name">
                                            {{ $member->{'organization_involvement_' . app()->getLocale()} ?: $member->organization_involvement_en }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
