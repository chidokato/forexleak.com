@extends('layout.index')

@section('title'){{$setting->title ? $setting->title : $setting->name}}@endsection
@section('description') {{$setting->description}} @endsection
@section('robots'){{'index, follow'}}@endsection
@section('url'){{asset('')}}@endsection
@section('img'){{asset('')}}{{'data/images/logo_-01.png'}}@endsection

@section('css')
<link rel="stylesheet" href="assets/css/shop.css" />
<link href="assets/css/indocators.css" rel="stylesheet">
@endsection

@section('content')

<section class="gm-blog-section pb-50 pt-50 dark-bg position-relative zindex-1 overflow-hidden">
    <img src="assets/img/shapes/gm-blog-gradient-1.png" alt="not found" class="position-absolute left-bottom">
    <img src="assets/img/shapes/gm-blog-gradient-3.png" alt="not found" class="position-absolute left-center">
    <img src="assets/img/shapes/gm-blog-gradient-2.png" alt="not found" class="position-absolute right-bottom">
    <div class="container">
        <div class="row justify-content-center mb-20">
            <div class="col-lg-6">
                <div class="section-heading text-center">
                    <h2>Expert <span class="host-web-gd-text">Advisor</span></h2>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-xl-12">
                <div class="hm-blog-grid-left">
                    <div class="row g-4">
                        @foreach($expert_advisor as $val)
                        <div class="col-md-2 col-4 aa11">
                            @include('pages.iteam.product')
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="gm-blog-section pb-50 pt-50 dark-bg position-relative zindex-1 overflow-hidden">
    <img src="assets/img/shapes/gm-blog-gradient-1.png" alt="not found" class="position-absolute left-bottom">
    <img src="assets/img/shapes/gm-blog-gradient-3.png" alt="not found" class="position-absolute left-center">
    <img src="assets/img/shapes/gm-blog-gradient-2.png" alt="not found" class="position-absolute right-bottom">
    <div class="container">
        <div class="row justify-content-center mb-20">
            <div class="col-lg-6">
                <div class="section-heading text-center">
                    <h2>Forex  <span class="host-web-gd-text">Trading Courses</span></h2>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-xl-12">
                <div class="hm-blog-grid-left">
                    <div class="row g-4">
                        @foreach($Forex_Trading_Courses as $val)
                        <div class="col-md-2">
                            @include('pages.iteam.product')
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>


<!--pricing section-->
<section class="pricing-tab-section light-bg pb-50 position-relative zindex-1 overflow-hidden">
    <img src="assets/img/shapes/line-red-top.png" alt="line shape" class="position-absolute right-top d-none d-lg-block">
    <img src="assets/img/shapes/line-red.svg" alt="line shape" class="position-absolute left-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading text-center">
                    <h2>Our Plans</h2>
                    <!-- <div class="tab-switch-btn d-inline-flex align-items-center justify-content-center position-relative mt-4">
                        <span class="monthly fw-bold">One Time</span>
                        <input type="checkbox" class="switch-input position-absolute">
                        <span class="toggle-switch-btn rounded-pill position-relative"></span>
                        <span class="yearly fw-bold">Life Time</span>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="pricing-wrapper position-relative zindex-1 ds4564">
            <img src="assets/img/shapes/frame.svg" alt="frame" class="position-absolute frame-shape">
            <div class="row g-4 justify-content-center mt-4">
                @foreach($indicators as $val)
                <div class="col-lg-4 col-md-6">
                    <div class="overflow-hidden position-relative bg-white deep-shadow" style="    border-radius: 20px;">
                        <!-- <span class="popular-badge position-absolute text-center fw-bold">Most Popular</span> -->
                        <!-- <p class="mt-4">Packed with great features, such as oneclick software installs,24/7 support</p> -->
                        {!! $val->content !!}
                        <!-- <a href="#" class="template-btn secondary-btn w-100 text-center mt-40">Purchase Plan</a> -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </div>
</section>
<!--pricing section end-->



<!-- Price -->
<div class="host-web-price-area host-fs-bg ptb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-lg-8">
                <div class="text-center mb-30">
                    <h6 class="host-fs-sub-title host-web-color-2 d-inline-flex align-items-center gap-3">
                        <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.14155 16.6077L18.1894 0.746819" stroke="#38EEB0" stroke-width="1.79988" />
                            <path d="M8.33836 17.5457L15.8265 9.18274" stroke="#38EEB0" stroke-width="1.79988" />
                        </svg>
                        Brokers
                    </h6>
                    <h2 class="host-web-title text-white fs-48 fw-800 mb-30">
                        Looking For Good  <span class="host-web-gd-text">Forex Broker?</span>
                    </h2>
                    <p class="text-white mb-0">A trustworthy broker provides competitive spreads, fast trade execution, and secure fund protection — all essential for a smooth trading experience. But with countless brokers out there, making the right choice can be overwhelming. Need guidance? Explore our comprehensive guide on How to Choose the Right Forex Broker and find the perfect match for your trading needs!</p>
                </div>
            </div>
        </div>
        @foreach($brokers as $val)
            @include('pages.iteam.broker')
        @endforeach
    </div>
</div>
<!-- Price -->

<!--blog section start-->
<section class="gm-blog-section pb-120 pt-100 dark-bg position-relative zindex-1 overflow-hidden">
    <img src="assets/img/shapes/gm-blog-gradient-1.png" alt="not found" class="position-absolute left-bottom">
    <img src="assets/img/shapes/gm-blog-gradient-3.png" alt="not found" class="position-absolute left-center">
    <img src="assets/img/shapes/gm-blog-gradient-2.png" alt="not found" class="position-absolute right-bottom">
    <div class="container position-relative zindex-1">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center">
                    <h2>Latest News Articles</h2>
                    <p>Stay updated with the latest news and insights from the Forex market. Get real-time trends, expert analysis, and key movements that matter.</p>
                </div>
            </div>
        </div>
        <div class="hm2-blog-wrapper mt-5 hm2-blog-slider swiper">
            <div class="swiper-wrapper">
                @foreach($posts as $val)
                <div class="swiper-slide hm2-blog-card bg-white">
                    <div class="feature-img rounded-top overflow-hidden">
                        <a href="{{$val->category?->slug}}/{{$val->slug}}"><img src="data/images/{{$val->img}}" alt="feature" class="img-fluid img300"></a>
                    </div>
                    <div class="hm2-blog-card-content position-relative">
                        <a href="{{$val->category?->slug}}" class="tag-btn rounded-pill position-absolute">{{$val->category?->name}}</a>
                        <a href="{{$val->category?->slug}}/{{$val->slug}}">
                            <h3 class="h5 mb-3 text-truncate-set text-truncate-set-1" title="{{$val->name}}">{{$val->name}}</h3>
                        </a>
                        <p class="text-truncate-set text-truncate-set-3">{{$val->detail}}</p>
                        <hr class="spacer mt-20 mb-20">
                        </hr>
                        <div class="bog-author d-flex align-items-center justify-content-between">
                            <div class="d-inline-flex align-items-center">
                                <img src="assets/img/home2/client-1.png" alt="author" class="img-fluid rounded-circle">
                                <h6 class="ms-2 mb-0">{{$val->User->yourname}}</h6>
                            </div>
                            <span class="date">{{date_format($val->updated_at,"d/m/Y")}}</span>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination slider-pagination"></div>
        </div>
    </div>
</section>
<!--blog section end-->

<!--hosting server-->
<section class="hosting-server ptb-120 position-relative overflow-hidden light-bg zindex-1">
    <img src="assets/img/shapes/server-bg.png" alt="server-bg" class="position-absolute right-top">
    <img src="assets/img/shapes/server-line-shape.png" alt="line shape" class="position-absolute left-bottom">
    <div class="container">
        <div class="question-box bg-white deep-shadow rounded-2">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="question-box-content">
                        <h3 class="h2">Join Our Community for FREE</h3>
                        <p>Join our group now to chat directly with our team. We're here to support you and answer any questions — completely free!</p>
                        <span class="phone fw-bold d-block mb-30">** zalo</span>
                        <a href="mailto:someone@example.com" class="template-btn primary-btn btn-small"><i class="fa-solid fa-comments"></i>JOIN HERE</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="agent-thumb mb-4 mb-lg-0">
                        <img src="assets/img/home2/agent.png" alt="agent" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--hosting server end-->

@endsection

@section('js')


@endsection
