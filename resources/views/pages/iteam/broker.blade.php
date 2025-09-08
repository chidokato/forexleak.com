<div class="host-web-price-item bg-white p-3 rounded-3 mt-20 position-relative z-1">
    <!-- <div class="sale-badge text-center position-absolute z--1">
        <span class="text-white fw-bold">30% Sale</span>
    </div> -->
    <div class="row align-items-center gap-4 gap-xl-0">
        <div class="col-xl-3">
            <div class="d-flex align-items-center flex-wrap flex-sm-nowrap gap-7">
                <div class="host-web-op-bg d-inline-block rounded-3 a1212">
                    <img src="data/images/{{ $val->img }}" alt="" class="img-fluid">
                    <span class="fs-20">{{ $val->heading }}</span>
                </div>
                <div class="host-web-content">
                    <!-- <h5 class="text-black fs-24 mb-10">{{ $val->heading }}</h5> -->
                    <!-- <p class="mb-0">Exness is a globally trusted forex broker known for ultra-fast execution, low trading costs, and instant 24/7 withdrawals!</p> -->
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="row align-items-center">
                <div class="col-md-9 info-list">
                    {!! $val->content !!}
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <!-- <a href="" class="template-btn isb-small-btn isb-gd-bg rounded-4 rounded-pill btn-small a111">Join Free</a> -->
                        <a href="{{ $val->linkaff }}" class="template-btn isb-small-btn isb-gd-bg rounded-4 rounded-pill btn-small a111">Register</a>
                    </div>
                    <div class="">
                        <a href="{{ $val->linkreview }}" class="template-btn outline-btn rounded-4 rounded-pill btn-small a111">Review</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>