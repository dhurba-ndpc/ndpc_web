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
    @if ($notices->count() > 0)
        <section class="section-notice">
            <div class="container">

                <!-- Header -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-6 section-title">
                        <h1 class="section-title mb-3 last_word_span_by_js">
                            {{ app()->getLocale() == 'ne' ? 'हाम्रा सूचनाहरू' : 'Our Notices ' }}
                        </h1>
                        <p> {{ app()->getLocale() == 'ne' ? 'NDPC बाट नवीनतम समाचार र घोषणाहरू' : 'Latest news and announcements from NDPC' }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <form id="noticeSearchForm" action="{{ route('notice.search') }}" method="GET">
                            <div class="search-box">
                                <input type="text" value="{{ request('search') }}" name="search" id="searchNotice"
                                    placeholder="Search notices...">
                                <button type="button" id="clearNoticeSearch" class="search-clear-btn"
                                    aria-label="Clear search" style="{{ request('search') ? '' : 'display: none;' }}">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                                <button type="submit" aria-label="Search notices">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Notices Grid -->
                <div class="row g-4" id="noticeResult">
                    @include('frontend.partials.notice-list', ['notices' => $notices])
                </div>
            </div>
        </section>
    @endif
@endsection
@push('scripts')
    <script>
        $('.last_word_span_by_js').each(function() {
            var text = $(this).text().trim();
            var words = text.split(/\s+/);
            var lastWord = words.pop();

            $(this).html(
                words.join(" ") + (words.length > 0 ? " " : "") + '<span class="last-word">' + lastWord +
                '</span>'
            );
        });
    </script>
    <script>
        $(document).ready(function() {
            const $searchInput = $('#searchNotice');
            const $clearButton = $('#clearNoticeSearch');
            const $resultBox = $('#noticeResult');
            let searchTimer = null;

            function loadNotices() {
                let search = $searchInput.val();
                $clearButton.toggle(search.length > 0);

                $.ajax({
                    url: "{{ route('notice.search') }}",
                    type: "GET",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        $resultBox.html(data);
                    }
                });
            }

            $('#noticeSearchForm').on('submit', function(event) {
                event.preventDefault();
                loadNotices();
            });

            $searchInput.on('keyup', function() {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(loadNotices, 250);
            });

            $clearButton.on('click', function() {
                $searchInput.val('');
                loadNotices();
                $searchInput.trigger('focus');
            });

        });
    </script>
@endpush
