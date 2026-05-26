@extends('frontend.layout.main')

@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('storage/' . $menu->image) }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1> {{ $menu->{'page_title_' . app()->getLocale()} ?: $menu->page_title_en }} {{ app()->getLocale() == 'ne' ? '-ग्यालेरी' : '-Gallery' }}</h1>
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

    @if ($get_album_gallery->count() > 0)
        <section id="gallery_page_wrapper" class="py-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="gallery-card">
                            <div class="gallery-card-body">
                                <h4 class="gallery-card-title">
                                    {{ app()->getLocale() == 'ne' ? 'एल्बमको फोटो ग्यालेरी' : 'Photo Gallery of Album' }} "
                                    <a
                                        href="{{ url('/album') }}">{{ $album_name->{'title_' . app()->getLocale()} ?: $album_name->title_en }}</a>
                                    "
                                </h4>
                                <p class="gallery-card-text">
                                    {{ app()->getLocale() == 'ne'
                                        ? 'खोल्नको लागि कुनै पनि थम्बनेलमा क्लिक गर्नुहोस् लाइटबक्समा।'
                                        : 'Click any thumbnail to open
                                                                                                        the images in a lightbox.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    @forelse ($get_album_gallery->galleries as $gallery)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="gallery-card">
                                <a href="{{ asset('storage/' . ($gallery->image ?? '')) }}" data-lightbox="roadtrip"
                                    class="gallery-thumb-link">
                                    <img src="{{ asset('storage/' . ($gallery->image ?? '')) }}" alt="Gallery image 1">
                                </a>
                                <div class="gallery-thumb-title">
                                    {{ $gallery->{'title_' . app()->getLocale()} ?: $gallery->title_en }}</div>
                            </div>
                        </div>
                    @empty
                    <p>Gallery Item are not Publish</p>
                    @endforelse


                </div>
            </div>
        </section>
    @endif
@endsection
@push('scripts')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>
@endpush
