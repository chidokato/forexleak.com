@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<!-- <link href="assets/css/about.css" rel="stylesheet"> -->
@endsection

@section('content')

<!--breadcrumb area start-->
<!-- <section class="breadcrumb-area bg-primary-gradient">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 class="mb-3">{{$data->name}}</h2>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{asset('')}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$data->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
</section> -->
<!--breadcrumb area end-->


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
                        Looking For Good  <br><span class="host-web-gd-text">Forex Broker?</span>
                    </h2>
                    <p class="text-white mb-0">A trustworthy broker provides competitive spreads, fast trade execution, and secure fund protection — all essential for a smooth trading experience. But with countless brokers out there, making the right choice can be overwhelming. Need guidance? Explore our comprehensive guide on How to Choose the Right Forex Broker and find the perfect match for your trading needs!</p>
                </div>
            </div>
        </div>
        
        <div class="host-web-price-item bg-white p-4 pt-30 rounded-3 mt-20 position-relative z-1">
            <!-- <div class="sale-badge text-center position-absolute z--1">
                <span class="text-white fw-bold">30% Sale</span>
            </div> -->
            <div class="row align-items-center gap-4 gap-xl-0">
                <div class="col-xl-5">
                    <div class="d-flex align-items-center flex-wrap flex-sm-nowrap gap-7">
                        <div class="host-web-op-bg d-inline-block rounded-3 a1212">
                            <img src="https://www.forexcracked.com/wp-content/uploads/elementor/thumbs/exness-logo-ForexCracked.com_-e1743009751580-r3frzh605c3tcvdh8j7xa9xnw0bxaj65r7gm4iujgg.png" alt="" class="img-fluid">
                        </div>
                        <div class="host-web-content">
                            <h5 class="text-black fs-24 mb-10">Exness</h5>
                            <p class="mb-0">Exness is a globally trusted forex broker known for ultra-fast execution, low trading costs, and instant 24/7 withdrawals!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <ul class="host-web-price-list d-flex align-items-center justify-content-between flex-wrap gap-5">
                                <li class="fs-14 fw-500">Regulation <span class="text-black fw-800">CySEC, FSA-S, FCA</span></li>
                                <li class="fs-14 fw-500">Operating since <span class="text-black fw-800">2008</span></li>
                                <li class="fs-14 fw-500">Minimum Deposit <span class="text-black fw-800">$10</span></li>
                                <li class="fs-14 fw-500">Small Accounts <span class="text-black fw-800">Yes ✅ (Cent)</span></li>
                                <li class="fs-14 fw-500">Max Leverage <span class="text-black fw-800">1:2000</span></li>
                                <li class="fs-14 fw-500">Platforms <span class="text-black fw-800">MT4, MT5</span></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="pl-40 mb-3">
                                <a href="" class="template-btn isb-small-btn isb-gd-bg rounded-4 rounded-pill btn-small a111">Register</a>
                            </div>
                            <div class="pl-40">
                                <a href="" class="template-btn isb-small-btn isb-gd-bg rounded-4 rounded-pill btn-small a111">Review</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- Price -->

@endsection

@section('js')

@endsection