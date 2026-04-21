@extends('frontend.layout.main')
@section('content')
    <section class="page_top_banner" style="background-image:url('{{ asset('frontend/images/page_top_banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top_banner_content">
                        <div class="row">
                            <div class="col-lg-12 justify-content-center d-flex">
                                <h1>Blogs Details</h1>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <p>Welcome to our blogs! Here you will find the latest news and updates from our team. We
                                    are a team of dedicated professionals committed to providing
                                    the best
                                    services to our clients. Welcome to our company! We are a team of dedicated
                                    professionals
                                    committed to providing the best services to our clients.</p>
                            </div>
                            <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> Blogs -> Blog Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG PAGE BODY START -->
    <section class="blog-page">
        <div class="container">
            <div class="row">

                <!-- LEFT SIDEBAR -->
                <div class="col-lg-3 py-5">

                    <!-- Recent Blogs -->
                    <div class="card sidebar-card mb-4">
                        <div class="card-body">
                            <h5 class="sidebar-title">Recent Blogs</h5>
                            <ul class="recent-list">
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/z2.jpg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">Prospects and Challenges of Digital Payment in Nepal</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/z3.jpeg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">QR Codes: The ‘Driving Force’ Behind Fostering the Adoption of
                                                Digital Payments in Nepal</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/z4.jpg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">KYC: Beyond the Compliance Requirement</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/z5.jpeg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">Namaste Pay USSD (Offline) Mode</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/z6.jpeg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">Ensuring Namaste Pay Security</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- MAIN CONTENT -->
                <div class="col-lg-9 py-5">

                    <div class="single_blog_detail_content  py-5">
                        <!-- Blog Title -->
                        <h2 class="blog-title mb-2">Prospects and Challenges of Digital Payment in Nepal</h2>

                        <!-- Meta -->
                        <div class="blog-meta mb-4">
                            <i class="bi bi-person-fill"></i>&nbsp;By Admin &nbsp; | &nbsp; <i
                                class="bi bi-calendar"></i>&nbsp;April 24, 2024 &nbsp; | &nbsp; <i
                                class="bi bi-bookmark-check"></i>&nbsp;Category: Digital Payments
                        </div>

                        <!-- Image -->
                        <div class="blog-image mb-4">
                            <img src="{{ asset('frontend/images/z2.jpg') }}" class="img-fluid rounded">
                        </div>

                        <!-- Content -->
                        <div class="blog-content">

                            <h5>Prospects and Challenges of Digital Payment in Nepal</h5>
                            <p>
                                In recent years, Nepal's financial ecosystem has undergone a remarkable shift, driven by the
                                transformative impact of the COVID-19 pandemic, and shifting consumer behaviors. This
                                transformation has driven digital payments to the forefront, with projections indicating a
                                substantial growth trajectory. According to Statista shows that by 2024, Nepal is expected
                                to witness a total transaction value of US$3,621.00 million, with a further surge to
                                US$6,105.00 million by 2028 with a 13.95% annual rate (CAGR 2024-2028). This increasing rate
                                indicates that the digital payment landscape has been transforming more towards digital
                                economy. Notably, QR code-based transactions have risen, marking an unbelievable increase of
                                189.53% in FY 2022/23 compared to the previous fiscal year (Payment Oversight Report, NRB,
                                2023), evidence to the rapid adoption of digital payment solutions in Nepal.
                            </p>

                            <h5>Prospects </h5>

                            <ol>
                                <li><strong>Smartphone Penetration</strong>: As per data of Nepal Population and Housing
                                    Census Statistic report (2021) the use of smartphone penetration rate stands 72.94%,
                                    which means smartphones have become universal in Nepal, making digital payment platforms
                                    more accessible, particularly among the younger population.&nbsp;</li>
                                <li><strong>Cost of Connectivity:&nbsp;</strong>The reduction in connectivity costs from USD
                                    2.25/GB in 2019 to USD 0.46/GB in 2023 has made digital transactions more affordable for
                                    a broader segment of the population.</li>
                                <li><strong>Government Support:&nbsp;</strong>The governmental of Nepal has initiated a
                                    program "Digital Framework Nepal" with a motto to foster a digital Nepal by 2030. This
                                    governmental initiative provides a favorable environment for digital payment adoption
                                    and encouraging further innovation and investment in Nepal.</li>
                                <li><strong>Indigenous Fintech Startups: L</strong>ocal companies such as eSewa, Khalti,
                                    IMEPay and Namaste Pay are driving digital payment adoption by offering fast,
                                    convenient, and secure alternatives to traditional banking services.</li>
                                <li><strong>Cross-Border Transactions:</strong> The collaborative efforts between the
                                    "National Payment Corporation of India (NPCI)" and “NCHL” and “Fonepay” has anticipated
                                    the commencement of digital payment gateway between Nepal and India has further impose
                                    the possibility to surge digital payment in Nepal.</li>
                                <li><strong>Remittance Solutions:&nbsp;</strong>according to the current macroeconomic and
                                    financial situation of the NRB report (2023/24), the significant increase in remittance
                                    inflows, as indicated by a 27.1% increment in FY 2022/23 compared to the previous year,
                                    underscores the potential of digital payment platforms to offer cost-effective and
                                    efficient remittance solutions, bridging the gap between senders and recipients.</li>
                                <li><strong>Emerging e-Commerce growth:&nbsp;</strong>Moreover, Nepal's position as the 79th
                                    in global e-commerce rankings, with forecasted revenue of US$679.7 million by 2024
                                    (<i>eCommerce Market Nepal)</i>, presents a profitable opportunity for digital payment
                                    service providers to cater to the growing online market.</li>
                            </ol>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- BLOG PAGE BODY END -->
@endsection
