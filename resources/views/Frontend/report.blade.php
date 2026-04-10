@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Reports</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our notices! Here you will find the latest news and updates from our team. We
                                    are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Reports</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5" id="report_page_wrapper">
        <div class="container">

            <div class="mb-4">
                <h4 class="fw-semibold">Reports - <span class="text_gradient_header">Download Links</span></h4>
            </div>

            <div class="card">

                <!-- Item -->
                <div class="report-item d-flex justify-content-between align-items-center">
                    <div class="report-title"><i class="bi bi-caret-right-fill"></i>&nbsp; Abstract Unaudited Financials (2082-83)</div>
                    <button class="btn btn-outline-primary btn-download">Download &nbsp; <i class="bi bi-download"></i></button>
                </div>

                <div class="report-item d-flex justify-content-between align-items-center">
                    <div class="report-title"><i class="bi bi-caret-right-fill"></i>&nbsp; Abstract Annual Financials (2081-82)</div>
                    <button class="btn btn-outline-primary btn-download">Download &nbsp; <i class="bi bi-download"></i></button>
                </div>

                <div class="report-item d-flex justify-content-between align-items-center">
                    <div class="report-title"><i class="bi bi-caret-right-fill"></i>&nbsp; Abstract Annual Financials (80-81)</div>
                    <button class="btn btn-outline-primary btn-download">Download &nbsp; <i class="bi bi-download"></i></button>
                </div>

                <div class="report-item d-flex justify-content-between align-items-center">
                    <div class="report-title"><i class="bi bi-caret-right-fill"></i>&nbsp; Abstract Annual Financials (79-80)</div>
                    <button class="btn btn-outline-primary btn-download">Download &nbsp; <i class="bi bi-download"></i></button>
                </div>

                <div class="report-item d-flex justify-content-between align-items-center border-0">
                    <div class="report-title"><i class="bi bi-caret-right-fill"></i>&nbsp; Abstract Annual Financials (78-79)</div>
                    <button class="btn btn-outline-primary btn-download">Download &nbsp; <i class="bi bi-download"></i></button>
                </div>

            </div>

            <!-- Footer info -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page_pagination_wrap">
                        <nav>
                            <ul class="pagination custom-pagination">

                                <!-- Previous Button -->
                                <li class="page-item">
                                    <a class="page-link circle-btn" href="#">
                                        &#8592;
                                    </a>
                                </li>

                                <!-- Page Numbers -->
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>

                                <!-- Next Button -->
                                <li class="page-item">
                                    <a class="page-link circle-btn" href="#">
                                        &#8594;
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
