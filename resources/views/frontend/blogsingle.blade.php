@extends('frontend.layout.main')

@section('title', ($blog->{'title_' . app()->getLocale()} ?: $blog->title_en) . ' - Namaste Pay')

@section('content')
    @php
        $blogTitle = $blog->{'title_' . app()->getLocale()} ?: $blog->title_en;
        $blogDescription = $blog->{'description_' . app()->getLocale()} ?: $blog->description_en;
        $blogAuthor = optional($blog->user)->name ?: 'NDPC Team';
        $publishedDate = optional($blog->created_at ?? $blog->updated_at)->format('M d, Y');
    @endphp

    <section class="blog-editorial-hero">
        <div class="container">
            <div class="blog-path">
                <a href="{{ url('/') }}">Home</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ url('/blogs') }}">Blogs</a>
                <i class="bi bi-chevron-right"></i>
                <span>Story</span>
            </div>

            <div class="blog-hero-grid">
                <div class="blog-hero-copy">
                    <p class="blog-journal-label">NDPC Journal</p>

                    @if ($blog->categories->count())
                        <div class="blog-category-row">
                            @foreach ($blog->categories as $cats)
                                <span class="blog_cat_list_name">
                                    {{ $cats->{'title_' . app()->getLocale()} ?: $cats->title_en }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <h1>{{ $blogTitle }}</h1>

                    <div class="blog-post-meta">
                        <span><i class="bi bi-person-fill"></i>{{ $blogAuthor }}</span>
                        @if ($publishedDate)
                            <span><i class="bi bi-calendar"></i>{{ $publishedDate }}</span>
                        @endif
                    </div>
                </div>

                <figure class="blog-hero-media">
                    <div class="blog-hero-image-frame">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blogTitle }}">
                    </div>
                </figure>
            </div>
        </div>
    </section>

    <section class="blog-page blog-single-page">
        <div class="container">
            <div class="blog-reading-grid">
                <aside class="blog-reading-rail">
                    @if ($blog->categories->count())
                        <div class="blog-rail-panel">
                            <p class="blog-rail-label">Topics</p>
                            <div class="blog-topic-list">
                                @foreach ($blog->categories as $cats)
                                    <span>{{ $cats->{'title_' . app()->getLocale()} ?: $cats->title_en }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="blog-rail-panel blog-recent-panel">
                        <p class="blog-rail-label">Recent Reads</p>
                        <ul class="recent-list">
                            @foreach ($recentBlog as $list)
                                <li>
                                    <a href="{{ route('blog-single', $list->slug) }}">
                                        <img src="{{ asset('storage/' .$list->image) }}" alt="Digital payment blog">
                                        <span>  {{ $list->{'title_' . app()->getLocale()} ?: $list->title_en }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>

                <article class="blog-story">
                    <div class="blog-content ck-blog-content">
                        {!! $blogDescription !!}
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
