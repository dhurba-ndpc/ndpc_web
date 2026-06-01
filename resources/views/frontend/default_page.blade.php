@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('storage/' . ($menu_page->image ?? '')) }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1> {{ $menu_page->{'page_title_' . app()->getLocale()} ?? ($menu_page->page_title_en ?? '') }}
                                </h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                {!! $menu_page->{'description_' . app()->getLocale()} ?? ($menu_page->description_en ?? '') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @if (!empty($menu_page->content_en))
        <section id="default_page_wrapper" class="default-page-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12">
                        <article class="default-page-card">
                            <div class="default-page-content">
                                {!! $menu_page?->{'content_' . app()->getLocale()} ?? ($menu_page?->content_en ?? '') !!}
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
