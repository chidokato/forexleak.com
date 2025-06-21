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
                    <div class="">
                        {!! $data->content !!}
                    </div>
                </div>
            </div>
        </div>
        
        @foreach($data->Section as $val)
            @include('pages.iteam.broker')
        @endforeach

    </div>
</div>
<!-- Price -->

@endsection

@section('js')

@endsection