    <section class="page_top_banner" style="background-image:url('')">
        <section class="page_top_banner"
            style="background: linear-gradient(135deg, rgba(25, 57, 128, 0.96), rgba(43, 75, 160, 0.92)), url('{{ asset('storage/' . ($menu->image ?? '')) }}') center center / cover no-repeat">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top_banner_content">
                            <div class="row">
                                <div class="col-lg-12 justify-content-center d-flex">
                                    <h1> {{ $menu->{'page_title_' . app()->getLocale()} ?? ($menu->page_title_en ?? '') }}
                                    </h1>
                                </div>
                                <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                    {!! $menu->{'description_' . app()->getLocale()} ?? ($menu->description_en ?? '') !!}
                                </div>
                                {{-- <div class="col-lg-8 m-auto justify-content-center d-flex text-center">
                                <span>Home -> About Us</span>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
