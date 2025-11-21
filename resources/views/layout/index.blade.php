<!doctype html>
<html data-bs-theme="dark">
<head>
    <!-- seo -->
    <base href="{{asset('')}}">
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" itemprop="keywords" content="@yield('keywords')" />
    <meta name="news_keywords" content="@yield('keywords')" />
    <meta name="robots" content="@yield('robots')"/>
    <link rel="shortcut icon" href="data/images/{{$setting->favicon}}" />
    <link rel="canonical" href="@yield('url')"/>
    <link rel="alternate" href="{{asset('')}}" hreflang="vi-vn" />
    <!-- and seo -->
    <!-- og -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="@yield('url')"/>
    <meta property="og:site_name" content="site_name"/>
    <meta property="og:images" content="@yield('img')"/>
    <meta property="og:image" content="@yield('img')"/>
    <meta property="og:image:alt" content="@yield('title')" />
    <!-- and og -->
    <!-- twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('description')" />
    <!-- and twitter -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="article:author" content="admin" />

    <!-- CSS ========================= -->
    
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;family=Urbanist:wght@600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&amp;display=swap" rel="stylesheet" />

    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!-- endbuild -->

    <!--custom css-->
    <link rel="stylesheet" href="assets/css/custom.css" />

    @yield('css')

    {!! $setting->header !!}
    
</head>

<body>
    <div class="body-overlay"></div>
    <div class="main-wrapper">
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    </div>
    <!-- JS ============================ -->
    <!--build:js-->
    <script src="assets/js/vendors/jquery.min.js"></script>
    <script src="assets/js/vendors/popper.min.js"></script>
    <script src="assets/js/vendors/bootstrap.min.js"></script>
    <script src="assets/js/vendors/easing.min.js"></script>
    <script src="assets/js/vendors/swiper.min.js"></script>
    <script src="assets/js/vendors/massonry.min.js"></script>
    <script src="assets/js/vendors/bootstrap-slider.js"></script>
    <script src="assets/js/vendors/magnific-popup.js"></script>
    <script src="assets/js/vendors/waypoints.js"></script>
    <script src="assets/js/vendors/counterup.js"></script>
    <script src="assets/js/vendors/isotop.pkgd.min.js"></script>
    <script src="assets/js/vendors/countdown.min.js"></script>
    <!-- <script src="assets/cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> -->
    <script src="assets/js/app.js"></script>
    <!--endbuild-->
    
    @yield('js')

    @if (Session::has('success'))
    <div class="alert alert-success">
    {{ Session::get('success') }}
    </div>
    @endif

    {!! $setting->footer !!}
    
</body>

</html>