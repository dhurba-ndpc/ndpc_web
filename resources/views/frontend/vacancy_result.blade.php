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
    <section id="vacancy_result_wrapper">
        <div class="container">

            <div class="text-center mb-5">
                <span class="text-primary-blue fw-bold small"> {{ app()->getLocale() == 'ne' ? 'रिक्तता परिणाम' : 'VACANCY RESULT' }}
</span>
                <h2 class="fw-bold text-navy mt-1"> {{ app()->getLocale() == 'ne' ? 'हामी तपाईंलाई हाम्रो टोलीमा स्वागत गर्दछौं।' : 'We Welcome You To Our Team.' }}
</h2>
            </div>
            @foreach ($recruitmentResult as $result)
                <div class="result-card shadow-sm border-0 mx-auto">
                    <div class="card-header-custom p-4 d-flex align-items-center justify-content-between">
                        <h2 class="h5 mb-0 text-white fw-semibold">
                            {{ $result->{'title_' . app()->getLocale()} ?: $result->title_en }}</h2>
                        <i class="bi bi-person-check-fill text-white fs-4"></i>
                    </div>

                    <div class="card-body p-4">
                        <div class="row mb-4 border-bottom pb-3">
                            <div class="col-sm-6 mb-2 mb-sm-0">
                                <p class="mb-0 text-muted small"> {{ app()->getLocale() == 'ne' ? 'प्रकाशित मिति' : 'Published Date' }}
</p>
                                <p class="fw-medium mb-0">
                                    {{ ($result->created_at ?? $result->updated_at)->format('Y-m-d') }}</p>
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                <p class="mb-0 text-muted small"> {{ app()->getLocale() == 'ne' ? 'कुल पदहरू' : 'Total Positions' }}
</p>
                                <p class="fw-medium mb-0"> {{ count($result->selected_candidates) }}</p>
                            </div>
                        </div>

                        <p class="text-muted small mb-4"> {{ app()->getLocale() == 'ne' ? 'भर्तीका लागि अन्तिम सिफारिस गरिएका उम्मेदवारहरू' : 'Final Recommended Candidates for Recruitment' }}
</p>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="list-container selected-bg">
                                    <div class="list-header p-3 d-flex align-items-center">
                                        <i class="bi bi-trophy-fill me-2 text-warning"></i>
                                        <h3 class="h6 mb-0 fw-bold"> {{ app()->getLocale() == 'ne' ? 'चयन गरिएको सूची' : 'Selected List' }}
</h3>
                                    </div>
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th class="ps-3 text-muted fw-normal small">S.N.</th>
                                                <th class="text-muted fw-normal small"> {{ app()->getLocale() == 'ne' ? 'उम्मेदवारहरूको नाम' : 'Name of Candidates' }}
</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result->selected_candidates as $canidate)
                                                <tr>
                                                    <td class="ps-3 fw-semibold">{{ $loop->iteration }}</td>
                                                    <td class="fw-semibold">
                                                        {{ $canidate['name_' . app()->getLocale()] ?: $canidate['name_en'] }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="list-container waiting-bg">
                                    <div class="list-header p-3 d-flex align-items-center">
                                        <i class="bi bi-clock-history me-2 text-secondary"></i>
                                        <h3 class="h6 mb-0 fw-bold text-secondary"> {{ app()->getLocale() == 'ne' ? 'प्रतीक्षा सूची' : 'Waiting List' }}
</h3>
                                    </div>
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th class="ps-3 text-muted fw-normal small">S.N.</th>
                                                <th class="text-muted fw-normal small">{{ app()->getLocale() == 'ne' ? 'उम्मेदवारहरूको नाम' : 'Name of Candidates' }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result->waiting_candidates as $canidate)
                                                <tr>
                                                    <td class="ps-3">{{ $loop->iteration }}.</td>
                                                    <td> {{ $canidate['name_' . app()->getLocale()] ?: $canidate['name_en'] }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
