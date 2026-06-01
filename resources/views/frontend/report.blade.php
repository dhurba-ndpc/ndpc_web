@extends('frontend.layout.main')
@section('content')
 @include('frontend.partials.menu_head_banner', ['menu' => $menu])
    @if (!@empty($reports) && $reports->count() > 0))


        <section class="py-5" id="report_page_wrapper">
            <div class="container">

                <div class="mb-4">
                    <h1 class="section-title mb-3">Reports&nbsp;<span>Download Links</span></h1>
                </div>

                <div class="card">
                    @foreach ($reports as $report)
                        <!-- Item -->
                        <div class="report-item d-flex justify-content-between align-items-center">
                            <div class="report-title"><i class="bi bi-caret-right-fill"></i>&nbsp;
                                {{ $report->{'title_' . app()->getLocale()} ?? ($report->title_en ?? '') }}
                            </div>
                            <a href="{{ asset('storage/' . ($report->file ?? '')) }}" target="_blank"
                                class="btn btn-outline-primary btn-download">Download &nbsp; <i
                                    class="bi bi-download"></i></a>
                        </div>
                    @endforeach
                </div>

                <!-- Footer info -->
                <div class="row">
                    <div class="col-lg-12">
                        @if ($reports->hasPages())
                            <div class="page_pagination_wrap">
                                <nav>
                                    <ul class="pagination custom-pagination">

                                        {{-- Previous Button --}}
                                        <li class="page-item {{ $reports->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link circle-btn" href="{{ $reports->previousPageUrl() }}">
                                                &#8592;
                                            </a>
                                        </li>

                                        {{-- Page Numbers --}}
                                        @foreach ($reports->links()->elements[0] ?? [] as $page => $url)
                                            <li class="page-item {{ $page == $reports->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endforeach

                                        {{-- Next Button --}}
                                        <li class="page-item {{ $reports->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link circle-btn" href="{{ $reports->nextPageUrl() }}">
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
    @endempty
@endsection
