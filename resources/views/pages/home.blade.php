@extends('layout.index')

@section('title'){{$setting->title ? $setting->title : $setting->name}}@endsection
@section('description') {{$setting->description}} @endsection
@section('robots'){{'index, follow'}}@endsection
@section('url'){{asset('')}}@endsection
@section('img'){{asset('')}}{{'data/images/logo_-01.png'}}@endsection

@section('css')


@endsection

@section('content')

<!--pricing section-->
<section class="pricing-tab-section light-bg pb-120 position-relative zindex-1 overflow-hidden">
    <img src="assets/img/shapes/line-red-top.png" alt="line shape" class="position-absolute right-top d-none d-lg-block">
    <img src="assets/img/shapes/line-red.svg" alt="line shape" class="position-absolute left-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading text-center">
                    <h2>Our Plans</h2>
                    <div class="tab-switch-btn d-inline-flex align-items-center justify-content-center position-relative mt-4">
                        <span class="monthly fw-bold">One Time</span>
                        <input type="checkbox" class="switch-input position-absolute">
                        <span class="toggle-switch-btn rounded-pill position-relative"></span>
                        <span class="yearly fw-bold">Life Time</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="pricing-wrapper position-relative zindex-1">
            <img src="assets/img/shapes/frame.svg" alt="frame" class="position-absolute frame-shape">
            <div class="row g-4 justify-content-center mt-4">
                
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-column overflow-hidden position-relative bg-white rounded-10 deep-shadow">
                        <h3 class="h5 S234">Starter</h3>
                        <span class="pricing-label d-block mt-2 mb-4">Indicator Collection Only</span>
                        <h4 class="h2 mt-2 monthly-price">$39.99<span>/mo</span></h4>
                        <h4 class="h2 mt-2 yearly-price">$390.99<span>/yr</span></h4>
                        <!-- <p class="mt-4">Packed with great features, such as oneclick software installs,24/7 support</p> -->
                        <ul class="feature-list mt-4">
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>Forex Signals</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>VIP Group</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>Beginer Course</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>cPanel Control Panel</li>
                            <li><span class="me-2"><i class="fa-solid fa-check"></i></span>Indicator Collection</li>
                        </ul>
                        <a href="#" class="template-btn secondary-btn w-100 text-center mt-40">Purchase Plan</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-column overflow-hidden position-relative bg-white rounded-10 deep-shadow">
                        <h3 class="h5 S234">Starter</h3>
                        <span class="popular-badge position-absolute text-center fw-bold">Most Popular</span>
                        <span class="pricing-label d-block mt-2 mb-4">Indicator Collection Only</span>
                        <h4 class="h2 mt-2 monthly-price">$39.99<span>/mo</span></h4>
                        <h4 class="h2 mt-2 yearly-price">$390.99<span>/yr</span></h4>
                        <!-- <p class="mt-4">Packed with great features, such as oneclick software installs,24/7 support</p> -->
                        <ul class="feature-list mt-4">
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>Forex Signals</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>VIP Group</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>Beginer Course</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>cPanel Control Panel</li>
                            <li><span class="me-2"><i class="fa-solid fa-check"></i></span>Indicator Collection</li>
                        </ul>
                        <a href="#" class="template-btn secondary-btn w-100 text-center mt-40">Purchase Plan</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-column overflow-hidden position-relative bg-white rounded-10 deep-shadow">
                        <h3 class="h5 S234">Starter</h3>
                        <span class="pricing-label d-block mt-2 mb-4">Indicator Collection Only</span>
                        <h4 class="h2 mt-2 monthly-price">$39.99<span>/mo</span></h4>
                        <h4 class="h2 mt-2 yearly-price">$390.99<span>/yr</span></h4>
                        <!-- <p class="mt-4">Packed with great features, such as oneclick software installs,24/7 support</p> -->
                        <ul class="feature-list mt-4">
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>Forex Signals</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>VIP Group</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>Beginer Course</li>
                            <li><span class="me-2"><i class="fa-solid fa-times"></i></span>cPanel Control Panel</li>
                            <li><span class="me-2"><i class="fa-solid fa-check"></i></span>Indicator Collection</li>
                        </ul>
                        <a href="#" class="template-btn secondary-btn w-100 text-center mt-40">Purchase Plan</a>
                    </div>
                </div>

                
            </div>
        </div>
        
    </div>
</section>
<!--pricing section end-->


<section class="blog-section light-bg pt-120 pb-120 overflow-hidden">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-9">
                        <div class="section-title text-center text-xl-start">
                            <h2>Our Latest News &amp; Blogs</h2>
                            <p>We are committed to offering customers the most professional and reliable web on UK-based servers, at prices.</p>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-6">
                        <div class="explore-btn text-center text-xl-end mt-3 mt-xl-0">
                            <a href="blog-grids.html" class="template-btn secondary-btn">See All Stories</a>
                        </div>
                    </div>
                </div>
                <div class="blog-bottom mt-5 position-relative zindex-1">
                    <img src="assets/img/shapes/circle-with-frame.png" alt="frame" class="position-absolute circle-frame">
                    <img src="assets/img/shapes/circle-blue.png" alt="frame" class="position-absolute circle-blue">
                    <div class="row g-4 justify-content-center">
                        <div class="col-xl-6 col-lg-10">
                            @foreach($posts as $key => $val)
                            @if($key==0)
                            <div class="blog-card bg-white deep-shadow rounded">
                                <div class="feature-thumb rounded-2 overflow-hidden position-relative">
                                    <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/images/{{$val->img}}" alt="{{$val->name}}" class="img-fluid img350"></a>
                                    <span class="position-absolute category-btn">{{$val->category->name}}</span>
                                </div>
                                <div class="blog-content-wrapper mt-4">
                                    <a href="{{$val->category->slug}}/{{$val->slug}}">
                                        <h3 class="text-truncate-set text-truncate-set-2">{{$val->name}}</h3>
                                    </a>
                                    <p class="mt-3 text-truncate-set text-truncate-set-3">{{$val->detail}}</p>
                                    <div class="blog-author mt-4 d-flex align-items-start align-items-sm-center justify-content-between">
                                        <div class="author-left d-flex align-items-center">
                                            <img src="assets/img/author-1.png" alt="author" class="img-fluid rounded-circle flex-shrink-0">
                                            <div class="author-info ms-3">
                                                <h6 class="mb-0">{{$val->User->yourname}}</h6>
                                                <span>03 May 2022</span>
                                            </div>
                                        </div>
                                        <div class="blog-meta">
                                            <a href="#"><i class="fa-solid fa-heart"></i>4.6k likes</a>
                                            <a href="#"><i class="fa-solid fa-comment"></i>19 comments</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-xl-6 col-lg-10 flex-column">
                            
                                @foreach($posts as $key => $val)
                                <div class="row g-4">
                                <div class="col-xl-12">
                                    <div class="blog-card d-flex align-items-center bg-white deep-shadow p-25 rounded-2">
                                        <div class="feature-thumb position-relative">
                                            <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/images/{{$val->img}}" alt="{{$val->name}}" class="img-fluid rounded-left img200"></a>
                                            <span class="position-absolute category-btn">{{$val->category->name}}</span>
                                        </div>
                                        <div class="blog-content ms-0 ms-sm-4 mt-3 mt-sm-0 flex-1">
                                            <a href="{{$val->category->slug}}/{{$val->slug}}">
                                                <h4 class="text-truncate-set text-truncate-set-2">{{$val->name}}</h4>
                                            </a>
                                            <div class="blog-author mt-4 d-flex align-items-start align-items-sm-center justify-content-between">
                                                <div class="author-left d-flex align-items-center">
                                                    <img src="assets/img/author-2.png" alt="author" class="img-fluid rounded-circle flex-shrink-0">
                                                    <div class="author-info ms-3">
                                                        <h6 class="mb-0">{{$val->User->yourname}}</h6>
                                                        <span>03 May 2022</span>
                                                    </div>
                                                </div>
                                                <div class="blog-meta">
                                                    <a href="#"><i class="fa-solid fa-heart"></i>4.6k likes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                        <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/images/{{$val->img}}" alt="feature" class="img-fluid img250"></a>
                    </div>
                    <div class="hm2-blog-card-content position-relative">
                        <a href="{{$val->category->slug}}" class="tag-btn rounded-pill position-absolute">{{$val->category->name}}</a>
                        <a href="{{$val->category->slug}}/{{$val->slug}}">
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
