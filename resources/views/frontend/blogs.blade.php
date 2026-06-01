@extends('frontend.layout.main')
@section('content')
 @include('frontend.partials.menu_head_banner', ['menu' => $menu])
    <!-- ══════════════ NEWS / BLOGS ══════════════ -->
   @if(!empty($blogs) && $blogs->count() > 0)
    <section class="news-section" id="innerPageBlogs">
        <div class="dots-pattern"></div>
        <div class="circular_floting_circle"></div>
        <div class="container">

            <p class="news-label mb-0">News/Blogs</p>
            <h2 class="news-title">Recent Entries</h2>

            <div class="row g-3">
                @foreach ($blogs as $blog)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="news-card">
                            <img src="{{ asset('storage/' . ($blog->image ?? '')) }}" alt="Blog 1">
                            <div class="news-body">
                                <p class="news-meta"><i
                                        class="bi bi-clock me-1"></i>{{ $blog->created_at?->diffForHumans() }}</p>
                                <h6 class="news-heading">
                                    <a href="{{ route('blog-single', $blog->slug) }}">
                                        {{ $blog->{'title_' . app()->getLocale()} ?? $blog->title_en ?? '' }}
                                    </a>
                                </h6>
                                <div class="news-excerpt">
                                   {!! Str::limit(strip_tags($blog->{'description_' . app()->getLocale()} ?? $blog->description_en ?? ''), 120) !!}
                                </div>
                            </div>
                            <div class="news-footer">
                                <a href="{{ route('blog-single', $blog->slug) }}" class="btn-read-sm">Read More <i
                                        class="bi bi-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
             <div class="row">
                <div class="col-lg-12">
                    @if ($blogs->hasPages())
                        <div class="page_pagination_wrap">
                            <nav>
                                <ul class="pagination custom-pagination">

                                    {{-- Previous Button --}}
                                    <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link circle-btn" href="{{ $blogs->previousPageUrl() }}">
                                            &#8592;
                                        </a>
                                    </li>

                                    {{-- Page Numbers --}}
                                    @foreach ($blogs->links()->elements[0] ?? [] as $page => $url)
                                        <li class="page-item {{ $page == $blogs->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach

                                    {{-- Next Button --}}
                                    <li class="page-item {{ $blogs->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link circle-btn" href="{{ $blogs->nextPageUrl() }}">
                                            &#8594;
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
