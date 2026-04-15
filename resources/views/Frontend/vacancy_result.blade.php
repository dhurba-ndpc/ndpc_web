@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Vacancy Results</h1>
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
                                <span>Home -> Vacancy Results</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="vacancy_result_wrapper">
        <div class="container">
           
             <div class="text-center mb-5">
                <span class="text-primary-blue fw-semibold small">Vacancy Result</span>
                <h2 class="fw-bold text-navy mt-1">We Welcome You To Our Team.</h2>
            </div>

            <div class="result-card shadow-sm border-0 mx-auto">
                <div class="card-header-custom p-4 d-flex align-items-center justify-content-between">
                    <h2 class="h5 mb-0 text-white fw-semibold">Jr. Laravel Developer</h2>
                    <i class="bi bi-person-check-fill text-white fs-4"></i>
                </div>

                <div class="card-body p-4">
                    <div class="row mb-4 border-bottom pb-3">
                        <div class="col-sm-6 mb-2 mb-sm-0">
                            <p class="mb-0 text-muted small">Published Date</p>
                            <p class="fw-medium mb-0">2026-03-20</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <p class="mb-0 text-muted small">Total Positions</p>
                            <p class="fw-medium mb-0">01</p>
                        </div>
                    </div>

                    <p class="text-muted small mb-4">Final Recommended Candidates for Recruitment</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="list-container selected-bg">
                                <div class="list-header p-3 d-flex align-items-center">
                                    <i class="bi bi-trophy-fill me-2 text-warning"></i>
                                    <h3 class="h6 mb-0 fw-bold">Selected List</h3>
                                </div>
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th class="ps-3 text-muted fw-normal small">S.N.</th>
                                            <th class="text-muted fw-normal small">Name of Candidates</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-3 fw-semibold">1.</td>
                                            <td class="fw-semibold">Dhurba Dhakal</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="list-container waiting-bg">
                                <div class="list-header p-3 d-flex align-items-center">
                                    <i class="bi bi-clock-history me-2 text-secondary"></i>
                                    <h3 class="h6 mb-0 fw-bold text-secondary">Waiting List</h3>
                                </div>
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th class="ps-3 text-muted fw-normal small">S.N.</th>
                                            <th class="text-muted fw-normal small">Name of Candidates</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-3">1.</td>
                                            <td>Anusha Pandey</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-3">2.</td>
                                            <td>Subodh Adhikari</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
