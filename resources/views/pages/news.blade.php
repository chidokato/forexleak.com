@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection
@section('css')

@endsection
@section('content')

<!--breadcrumb area start-->
<section class="breadcrumb-area bg-primary-gradient">
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
</section>
<!--breadcrumb area end-->


<section class="hm-blog-grids pt-100 pb-100 overflow-hidden">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-12">
                <div class="hm-blog-grid-left">
                    <div class="row g-4">
                        @foreach($posts as $val)
                        <div class="col-md-4">
                            <div class="hm2-blog-card bg-white deep-shadow">
                                <div class="feature-img rounded-top overflow-hidden">
                                    <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/images/{{$val->img}}" alt="feature" class="img-fluid img250"></a>
                                </div>
                                <div class="hm2-blog-card-content position-relative">
                                    <a href="{{$val->category->slug}}" class="tag-btn rounded-pill position-absolute">{{$val->category->name}}</a>
                                    <a href="{{$val->category->slug}}/{{$val->slug}}">
                                        <h3 class="h5 mb-3 text-truncate-set text-truncate-set-2">{{$val->name}}</h3>
                                    </a>
                                    <p class="text-truncate-set text-truncate-set-3">{{$val->detail}}</p>
                                    <hr class="spacer mt-20 mb-20">
                                    <div class="bog-author d-flex align-items-center justify-content-between">
                                        <div class="d-inline-flex align-items-center">
                                            <img src="assets/img/home2/client-1.png" alt="author" class="img-fluid rounded-circle">
                                            <h6 class="ms-2 mb-0">{{$val->User->yourname}}</h6>
                                        </div>
                                        <span class="date">{{date_format($val->updated_at,"d/m/Y")}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <!-- <div class="template-pagination mt-60">
                        <ul class="d-flex align-items-center">
                            <li><a href="#" class="active">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection