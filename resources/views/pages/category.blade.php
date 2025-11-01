@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<link rel="stylesheet" href="assets/css/shop.css" />
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

<section class="hm-blog-grids pt-100 pb-100 overflow-hidden shop">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-12">
                <div class="hm-blog-grid-left">
                    <div class="row g-4">
                        @foreach($posts as $val)
                        <div class="col-md-2">
                            <div class="hm2-blog-card bg-white deep-shadow">
                                <div class="feature-img rounded-top overflow-hidden">
                                    <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/images/{{$val->img}}" alt="feature" class="img-fluid img150"></a>
                                </div>
                                <div class="hm2-blog-card-content position-relative">
                                    <a href="{{$val->category->slug}}" class="tag-btn rounded-pill position-absolute">{{$val->category->name}}</a>
                                    <a href="{{$val->category->slug}}/{{$val->slug}}">
                                        <h3 class="h5 mb-3 text-truncate-set text-truncate-set-2">{{$val->name}}</h3>
                                    </a>
                                    <div class="price">
                                        <span>{{$val->price? '$'.$val->price:'$0'}}</span>
                                        <button class="addcard host-fs-btn-bg border-0">Add to Card</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    {{ $posts->appends(request()->all())->links() }}
                </div>
            </div>
            
        </div>
    </div>
</section>


@endsection

@section('js')

@endsection