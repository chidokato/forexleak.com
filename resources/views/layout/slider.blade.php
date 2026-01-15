@foreach($slider as $key => $val)
@if($key ==0)
<section class="hero-22 position-relative z-1" style="background-image: url(data/images/{{$val->img}});">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-lg-10 col-xxl-8">
                <div class="text-center mt-4">
                    <h1 class="text-white fs-64">$25K in Funded Trading Accounts Giveaway</h1>
                </div>
                <ul class="list-unstyled d-flex align-items-center justify-content-center gap-3 flex-wrap mb-0 mt-4">
                    <li class="d-flex align-items-center gap-2">
                        <span class="text-warning"><i class="fa-solid fa-check"></i></span>
                        <p class="text-white fs-18 fw-semibold mb-0">Brokers</p>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <span class="text-warning"><i class="fa-solid fa-check"></i></span>
                        <p class="text-white fs-18 fw-semibold mb-0">Forex Indicators</p>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <span class="text-warning"><i class="fa-solid fa-check"></i></span>
                        <p class="text-white fs-18 fw-semibold mb-0">Strategies</p>
                    </li>
                </ul>
                <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap pt-40">
                    <a href="" class="template-btn host-fs-btn-bg fs-hover-style fw-bold text-black rounded-pill">Enter Now!</a>
                    <a href="" class="template-btn outline-btn fs-outline-hover-style text-warning host-fs-border-clr rounded-pill">Contact !</a>
                </div>
            </div> -->
        </div>
    </div>
</section>
@endif
@endforeach