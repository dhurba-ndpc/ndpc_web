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
                                            <img src="{{ asset('frontend/images/Goal.jpg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">How to Protect
                                                Your Online
                                                Payments</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/a2.jpg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">Top 5 Trends in Fintech
                                                for 2024</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/background1.jpg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">Understanding Mobile
                                                Wallets: A Beginner's Guide</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/Mission.jpg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">Secure Your E-commerce
                                                Business: Tips and Tricks</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="recent_single_list">
                                        <div class="recent_single_list_image">
                                            <img src="{{ asset('frontend/images/Goal.jpg') }}" alt="">
                                        </div>
                                        <div class="recent_single_list_content">
                                            <a href="#">Blockchain Technology and
                                                Its Impact on Payments</a>
                                            <span><i class="bi bi-calendar"></i>&nbsp;April 20, 2024</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- MAIN CONTENT -->
                <div class="col-lg-9 ">

                    <div class="single_blog_detail_content  py-5">
                        <!-- Blog Title -->
                        <h2 class="blog-title mb-2">The Future of Digital Payments in Nepal</h2>

                        <!-- Meta -->
                        <div class="blog-meta mb-4">
                            <i class="bi bi-person-fill"></i>&nbsp;By Admin &nbsp; | &nbsp; <i
                                class="bi bi-calendar"></i>&nbsp;April 24, 2024 &nbsp; | &nbsp; <i
                                class="bi bi-bookmark-check"></i>&nbsp;Category: Digital Payments
                        </div>

                        <!-- Image -->
                        <div class="blog-image mb-4">
                            <img src="{{ asset('frontend/images/a2.jpg') }}" class="img-fluid rounded">
                        </div>

                        <!-- Content -->
                        <div class="blog-content">

                            <h5>Digital Payments and Their Rise in Nepal</h5>
                            <p>
                                Nepal’s adoption of digital payments has seen significant growth in recent years.
                                Increased access to smartphones and improved internet connectivity have driven this shift.
                            </p>

                            <h5>Key Drivers of Digital Payment Adoption</h5>

                            <ol>
                                <li><strong>Increased Smartphone Penetration:</strong> QR codes are simple to use and only
                                    require smartphone cameras to scan and pay. Thus, it is user-friendly, which enhances
                                    customer experiences with its simplicity feature. QR codes are simple to use and only
                                    require smartphone cameras to scan and pay. Thus, it is user-friendly, which enhances
                                    customer experiences with its simplicity feature.</li>
                                <li><strong>Government Initiatives:</strong> Policies supporting cashless transactions are
                                    accelerating adoption.</li>
                                <li><strong>Improved Internet Connectivity:</strong> Reliable internet services enable
                                    seamless
                                    digital transactions.</li>
                            </ol>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- BLOG PAGE BODY END -->
@endsection
