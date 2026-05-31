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
        <section id="bord_member_photo_wrapper" class="member-board-section">
            <div class="container">
                <div class="member-section-heading text-center">
                    <span class="member-section-subtitle">
                        {{ app()->getLocale() == 'ne' ? 'हाम्रो बारेमा' : 'ABOUT US' }}
                    </span>
                    <h2>{{ app()->getLocale() == 'ne' ? 'हाम्रो निर्देशक बोर्ड' : 'Our Board Of Directors' }}</h2>
                </div>

                @foreach ($board_director as $member)
                    @if ($loop->first)
                        <div class="row justify-content-center mb-5">
                            <div class="col-xl-4 col-lg-5 col-md-7">
                                <article class="director-card director-card-featured text-center h-100">
                                    <div class="director-card-inner">
                                        <div class="avatar-container">
                                            <img src="{{ asset('storage/' . $member->image) }}"
                                                alt="{{ $member->{'name_' . app()->getLocale()} ?: $member->name_en }}"
                                                class="avatar-img">
                                        </div>
                                        <div class="card-content">
                                            <h3 class="director-name">
                                                {{ $member->{'name_' . app()->getLocale()} ?: $member->name_en }}
                                            </h3>
                                            <span class="director-position director-position-primary">
                                                {{ $member->{'position_' . app()->getLocale()} ?: $member->position_en }}
                                            </span>
                                            <p class="organisation-name">
                                                {{ $member->{'organization_involvement_' . app()->getLocale()} ?: $member->organization_involvement_en }}
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="row g-4 justify-content-center member-grid">
                    @foreach ($board_director->skip(1) as $member)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <article class="director-card text-center h-100">
                                <div class="director-card-inner">
                                    <div class="avatar-container">
                                        <img src="{{ asset('storage/' . $member->image) }}"
                                            alt="{{ $member->{'name_' . app()->getLocale()} ?: $member->name_en }}"
                                            class="avatar-img">
                                    </div>
                                    <div class="card-content">
                                        <h3 class="director-name">
                                            {{ $member->{'name_' . app()->getLocale()} ?: $member->name_en }}
                                        </h3>
                                        <span class="director-position">
                                            {{ $member->{'position_' . app()->getLocale()} ?: $member->position_en }}
                                        </span>
                                        <p class="organisation-name">
                                            {{ $member->{'organization_involvement_' . app()->getLocale()} ?: $member->organization_involvement_en }}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
