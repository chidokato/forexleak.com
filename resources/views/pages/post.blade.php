@extends('layout.index')

@section('title'){{$post->title ? $post->title : $post->name}}@endsection
@section('description'){{$post->description ? $post->description : $post->name.$post->name}}@endsection
@section('robots'){{'index, follow'}}@endsection
@section('url'){{asset('')}}{{$post->category->slug}}/{{$post->slug}}@endsection
@section('img'){{asset('')}}data/images/{{$post->img}}@endsection

@section('css')
@endsection

@section('content')

<!--breadcrumb area start-->
<section class="breadcrumb-area bg-primary-gradient">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 class="mb-3">{{$post->name}}</h2>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$post->category->name}}</a></li>
                    <li class="breadcrumb-item active">{{$post->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!--breadcrumb area end-->

<!--blog grid start-->
<section class="hm-blog-grids pt-120 pb-120 overflow-hidden">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-12">
                <div class="hm-blog-grid-left bg-white deep-shadow rounded-2">
                    <div class="hm2-blog-card">
                        <div class="feature-img rounded-top overflow-hidden">
                            <img src="data/images/{{$post->img}}" alt="feature" class="img-fluid">
                        </div>
                        <div class="bd-content-wrapper">
                            <div class="bd-blog-meta d-flex align-items-center flex-wrap">
                                <div class="bd-blog-author d-flex align-items-center me-5">
                                    <img src="assets/img/author-1.png" alt="author" class="rounded-pill img-fluid flex-shrink-0">
                                    <div class="bd-blog-author-info ms-3">
                                        <span>Author Name</span>
                                        <h6 class="mb-0 mt-1">{{$post->User->yourname}}</h6>
                                    </div>
                                </div>
                                <div class="bd-blog-categories me-5 mt-3 mt-md-0">
                                    <span>Categories</span>
                                    <h6 class="mb-0 mt-1">{{$post->category->name}}</h6>
                                </div>
                                <div class="bd-blog-date mt-3 mt-md-0">
                                    <span>Date</span>
                                    <h6 class="mb-0 mt-1">{{date_format($post->updated_at,"d/m/Y")}}</h6>
                                </div>
                            </div>
                            <h1 class="bd-blog-title mt-5 mb-4">{{$post->name}}</h1>

                            <div class="main-content-detail">.
                                <p>{!! $post->detail !!}</p>
                                {!! $post->content !!}
                            </div>

                          
                            <div class="bd-blog-bottom mt-4">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="bd-blog-share">
                                            <h6>Share this Post</h6>
                                            <div class="social-icons mt-3">
                                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                                <a href="#" class="dribble"><i class="fab fa-dribbble"></i></a>
                                                <a href="#" class="behance"><i class="fab fa-behance"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bd-blog-tags">
                                            <h6>Related Tags.</h6>
                                            <div class="tags-wrapper mt-3">
                                                <a href="#" class="mb-3">Domain</a>
                                                <a href="#" class="mb-3">Web Hosting</a>
                                                <a href="#" class="mb-3">Security</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bd-author-info mt-60 rounded d-block d-sm-flex align-items-center">
                                <img src="assets/img/bd-author-1.png" alt="author" class="img-fluid flex-shrink-0 rounded-circle">
                                <div class="bd-author-info-right mt-3 mt-sm-0 ms-sm-3">
                                    <h6>Darrell Steward</h6>
                                    <p>Holisticly generate customized value and next-generation convergence. Assertively leverage existing state of the art intellectual capital through market positioning innovation.</p>
                                </div>
                            </div>
                            <div class="bd-related-posts mt-60">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="bd-rl-post-wrapper d-flex align-items-center">
                                            <a href="#" class="flex-shrink-0"><img src="assets/img/rs-blog-1.png" alt="thumb" class="img-fluid rounded-circle"></a>
                                            <div class="rs-post-info ms-3">
                                                <a href="#">
                                                    <h6 class="mb-1">Improving Website Perform with Lite Speed.</h6>
                                                </a>
                                                <span>By Somalia Silba</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bd-rl-post-wrapper d-flex align-items-center">
                                            <a href="#" class="flex-shrink-0"><img src="assets/img/rs-blog-2.png" alt="thumb" class="img-fluid rounded-circle"></a>
                                            <div class="rs-post-info ms-3">
                                                <a href="#">
                                                    <h6 class="mb-1">Attentive was born in 2015 sales teams</h6>
                                                </a>
                                                <span>By Somalia Silba</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
@endsection