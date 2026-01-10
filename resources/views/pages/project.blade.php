@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection
@section('img'){{asset('')}}data/images/{{$post->img}}@endsection

@section('css')
<link href="assets/css/shop.css" rel="stylesheet">

<link href="assets/css/swiper-bundle.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    .user-content{
  font-family: inherit;
  font-size: 16px;
  line-height: 1.75;
  color: #111;
}

/* ĐÈ inline style phổ biến */
.user-content *{
  font-family: inherit !important;
  font-size: inherit !important;
  line-height: inherit !important;
  color: inherit !important;

  background: transparent !important;
  text-align: inherit !important;
  letter-spacing: normal !important;
}

/* Link */
.user-content a{
  color: #2563eb !important;
  text-decoration: underline !important;
}

/* Khoảng cách chuẩn */
.user-content p{ margin: 0 0 1rem; }
.user-content h1{ font-size: 1.8rem; margin: 1.2rem 0 .8rem; }
.user-content h2{ font-size: 1.5rem; margin: 1.1rem 0 .7rem; }
.user-content h3{ font-size: 1.25rem; margin: 1rem 0 .6rem; }
.user-content ul, .user-content ol{ margin: 0 0 1rem 1.25rem; }
.user-content li{ margin: .25rem 0; }

/* Ảnh/iframe không phá layout */
.user-content img, .user-content video{
  max-width: 100% !important;
  height: auto !important;
}
.user-content iframe{
  max-width: 100% !important;
}

/* Table */
.user-content table{
  width: 100% !important;
  border-collapse: collapse !important;
  margin: 0 0 1rem;
}
.user-content th, .user-content td{
  border: 1px solid #e5e7eb !important;
  padding: 8px 10px !important;
  vertical-align: top !important;
}

/* Không cho font <font> / span bậy bạ làm màu nền */
.user-content span, .user-content font{
  background: transparent !important;
}
</style>

@endsection

@section('content')

<div class="container project mt-4">
    <div class="row align-items-center">
        <div class="col-xl-6">

            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="data/images/{{$post->img}}" /></div>
                @foreach($post->Images as $img)
                <div class="swiper-slide"><img src="data/images/{{$img->img}}" /></div>
                @endforeach      
              </div>
            </div>

            <div thumbsSlider="" class="swiper mySwiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="data/images/{{$post->img}}" /></div>
                @foreach($post->Images as $img)
                <div class="swiper-slide"><img src="data/images/{{$img->img}}" /></div>
                @endforeach                
              </div>
            </div>

        </div>
        <div class="col-xl-6">
            <div class="breadcrumb-content text-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{asset('')}}">Home</a></li>
                        <li class="breadcrumb-item active"><span>{{$post->name}}</span></li>
                    </ol>
                </nav>
            </div>
            <h1 class="host-fs-title text-white">{{$post->name}}</h1>
            <p class="text-white">
                {{$post->detail}}
            </p>
            <hr>
            <div class="div_card">
                <div class="div_card">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="name" value="{{ $post->name }}">
                        <input type="hidden" name="price" value="{{ $post->price }}">
                        <input type="number" name="quantity" value="1" min="1" max="10" class="template-btn outline-btn btn-small">
                        <button type="submit" class="template-btn secondary-btn btn-small">
                            Add to Cart
                        </button>
                    </form>
                </div>

            </div>
            <hr>
            <div class="div_login">
                <!-- <button class="template-btn outline-btn fs-outline-hover-style text-warning host-fs-border-clr rounded-pill border-radius">Login to Google</button> -->
            </div>
            
        </div>
        <div class="col-xl-9 main-content-detail mt-5 user-content">
            {!! $post->content !!}
        </div>
        <div class="col-xl-3">
            
        </div>
    </div>
</div>


@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
<script>
  // Swiper thumbnail (dọc)
  var swiper = new Swiper(".mySwiper", {
    direction: "vertical",   // 🔹 chuyển sang chiều dọc
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });

  // Swiper chính
  var swiper2 = new Swiper(".mySwiper2", {
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
</script>


@endsection