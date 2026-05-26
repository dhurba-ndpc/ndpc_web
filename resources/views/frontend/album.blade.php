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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @if ($album_detail->count() > 0)
        <section id="album_wrapper" class="py-5">
            <div class="container">
                <div class="row">
                    @foreach ($album_detail as $album)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="album-card">
                                <div class="album-thumb">
                                    <img src="{{ asset('storage/' . ($album->image ?? '')) }}" alt="Album thumbnail">
                                </div>
                                <div class="album-card-body">
                                    <span class="album-label"> {{ app()->getLocale() == 'ne' ? 'एल्बम' : 'Album' }}
                                        ({{ $album->galleries->count() }}-photo)</span>
                                    <h5 class="album-title">
                                        {{ $album->{'title_' . app()->getLocale()} ?: $album->title_en }}
                                    </h5>
                                    <div class="album-text">
                                        {!! $album->{'description_' . app()->getLocale()} ?: $album->description_en !!}
                                    </div>
                                    <a href="{{ route('gallery', $album->slug) }}" class="btn-album">Open Gallery <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
