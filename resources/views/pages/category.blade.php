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
                            @include('pages.iteam.product')
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