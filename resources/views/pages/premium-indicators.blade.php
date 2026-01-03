@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<link href="assets/css/indocators.css" rel="stylesheet">
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


<!--pricing section-->
<section class="pricing-tab-section light-bg pb-120 position-relative zindex-1 overflow-hidden">
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
                @foreach($data->Section as $val)
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-column overflow-hidden position-relative bg-white rounded-10 deep-shadow">
                        <!-- <span class="popular-badge position-absolute text-center fw-bold">Most Popular</span> -->
                        <!-- <p class="mt-4">Packed with great features, such as oneclick software installs,24/7 support</p> -->
                        {!! $val->content !!}
                        <a href="#" class="template-btn secondary-btn w-100 text-center mt-40">Purchase Plan</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </div>
</section>
<!--pricing section end-->

<section class="container">
    <div class="main-content-detail">
        {!! $data->content !!}
    </div>
    
    
</section>


@endsection

@section('js')

@endsection