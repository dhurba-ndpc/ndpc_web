@extends('frontend.layout.main')

@section('title', ($blog->{'title_' . app()->getLocale()} ?: $blog->title_en) . ' - Namaste Pay')

@section('content')
    @php
        $blogTitle = $blog->{'title_' . app()->getLocale()} ?: $blog->title_en;
        $blogDescription = $blog->{'description_' . app()->getLocale()} ?: $blog->description_en;
        $blogAuthor = optional($blog->user)->name ?: 'NDPC Team';
        $publishedDate = optional($blog->created_at ?? $blog->updated_at)->format('M d, Y');
    @endphp

    <section class="blog-single-page-header">
        <div class="container">
            <div class="blog-single-page-header-inner">
                <p>NDPC Journal</p>
                <h1>{{ $blogTitle }}</h1>
                <div class="blog-single-header-meta">
                    @if ($blog->categories->count())
                        <div class="blog-single-header-categories">
                            @foreach ($blog->categories as $cats)
                                <span>
                                    {{ $cats->{'title_' . app()->getLocale()} ?: $cats->title_en }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <div class="blog-single-header-details">
                        <span><i class="bi bi-person-fill"></i>{{ $blogAuthor }}</span>
                        @if ($publishedDate)
                            <span><i class="bi bi-calendar"></i>{{ $publishedDate }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-single-modern">
        <div class="container">
            <article class="blog-single-shell">
                <figure class="blog-single-image">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blogTitle }}">
                </figure>

                <div class="blog-single-content ck-blog-content">
                    {!! $blogDescription !!}
                </div>
            </article>

            @if ($recentBlog->count())
                <section class="blog-single-related">
                    <div class="blog-single-related-head">
                        <span>More Reads</span>
                        <h2>Recent Articles</h2>
                    </div>
                    <div class="row g-4">
                        @foreach ($recentBlog->take(3) as $list)
                            <div class="col-lg-4 col-md-6">
                                <a href="{{ route('blog-single', $list->slug) }}" class="blog-related-card">
                                    <img src="{{ asset('storage/' . $list->image) }}"
                                        alt="{{ $list->{'title_' . app()->getLocale()} ?: $list->title_en }}">
                                    <span>{{ $list->{'title_' . app()->getLocale()} ?: $list->title_en }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </section>
@endsection
