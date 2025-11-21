@extends('layout.index')

@section('title') Profile  @endsection
@section('description') Profile @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')
<link href="assets/css/account.css" rel="stylesheet">
@endsection

@section('content')

<section class="pt-50 pb-50 account">
    <div class="container">
        <div class="faq-tab hm2-faq-tab mt-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="tab-left">
                        <ul class="hm2-server-tab-control nav nav-tabs border-0">
                            <li><a href="account/main"><button ><i class="fa-solid fa-circle-user"></i><span class="ms-3">My Account</span></button></a></li>
                            <li><a href="account/deposit"><button class="active"><i class="fa-solid fa-wallet"></i><span class="ms-3">Deposit</span></button></a></li>
                            <li><button><i class="fa-solid fa-clock-rotate-left"></i><span class="ms-3">Purchase history</span></button></li>
                            <li><button><i class="fa-solid fa-briefcase"></i><span class="ms-3">My trading account</span></button></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="accordion hm2-accordion rounded-2 deep-shadow bg-white" id="accordion_2">
                        <h4 class="">Balance: <span>${{$user->balance?$user->balance:'0'}}</span></h4>
                        <hr>
                        <div class="row justify-content-center g-4">
                            <div class="col-xl-4 col-lg-4 col-sm-6">
                                <a href="account/transfer/ctypto">
                                    <div class="dm-pp-domain-item position-relative overflow-hidden zindex-1">
                                        <i class="fa-brands fa-bitcoin icon-main"></i>
                                        <span class="dm-offer-badge fw-bold text-white position-absolute">0% fee</span>
                                        <h6 class="mt-4">CRYPTO</h6>
                                        <span class="subtitle">Min $20</span>
                                        Select<i class="fa-solid fa-arrow-right-long"></i>
                                        <span class="circle-small position-absolute"></span>
                                        <span class="circle-shape shape-1 position-absolute"></span>
                                        <span class="circle-shape shape-2 position-absolute"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-6">
                                <a href="account/transfer/bank">
                                    <div class="dm-pp-domain-item position-relative overflow-hidden zindex-1">
                                        <i class="fa-solid fa-building-columns icon-main"></i>
                                        <span class="dm-offer-badge fw-bold text-white position-absolute">0% fee</span>
                                        <h6 class="mt-4">Bank Transfer</h6>
                                        <span class="subtitle">Min $20</span>
                                        Select<i class="fa-solid fa-arrow-right-long"></i>
                                        <span class="circle-small position-absolute"></span>
                                        <span class="circle-shape shape-1 position-absolute"></span>
                                        <span class="circle-shape shape-2 position-absolute"></span>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                        <hr>
                        <h4 class="">Deposit history</h4>
                        @if($transactions->isEmpty())
                            <p class="text-muted mt-2">You don’t have any deposit yet.</p>
                        @else
                            <div class="table-responsive mt-3">
                                <table class="table table-dark table-striped align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Time</th>
                                            <th>Order Code</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $index => $tx)
                                            @php
                                                $badgeClass = match($tx->status) {
                                                    'success'   => 'bg-success',
                                                    'processing'=> 'bg-info',
                                                    'pending'   => 'bg-warning text-dark',
                                                    'cancelled' => 'bg-secondary',
                                                    'failed'    => 'bg-danger',
                                                    default     => 'bg-light text-dark',
                                                };
                                            @endphp

                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $tx->created_at->format('Y-m-d H:i') }}</td>
                                                <td>{{ $tx->order_code }}</td>
                                                <td>${{ number_format($tx->amount, 0) }}</td>
                                                <td>{{ strtoupper($tx->method) }}</td>
                                                <td>
                                                    <span class="badge {{ $badgeClass }}">
                                                        {{ ucfirst($tx->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if(!in_array($tx->status, ['cancelled', 'success', 'processing', 'approved']))
                                                        <a href="{{ url('account/deposits/show/' . $tx->id) }}" class="btn btn-sm btn-outline-primary"> View </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>

                            {{-- Nếu dùng paginate() trong controller --}}
                            <div class="mt-3">
                                {{ $transactions->links() }}
                            </div>
                        @endif
                        <hr>
                        <div class="host-fs-support-area pt-50 pb-40">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <h5 class="host-fs-title text-black fs-48 fw-800"> &nbsp;Multi-Channel Support</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xxl-10">
                                        <div class="position-relative z-1s">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="isb-support-box bg-white text-center ptb-50 rounded-12 mt-20">
                                                        <img src="assets/img/support.png" alt="" class="isb-support-image">
                                                        <h6 class="text-black mt-20">WhatsApp</h6>
                                                        <p class="fs-14 text-black">@username</p>
                                                        <a href="#" class="btn isb-small-btn fs-hover-style fs-hover-style text-black border-dark mt-10">Get in Touch</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="isb-support-box bg-white text-center ptb-50 rounded-12 mt-20">
                                                        <img src="assets/img/support2.png" alt="" class="isb-support-image">
                                                        <h6 class="text-black mt-20">Telegram</h6>
                                                        <p class="fs-14 text-black">@username</p>
                                                        <a href="#" class="btn isb-small-btn fs-hover-style fs-hover-style text-black border-dark mt-10">Get
                                                            in
                                                            Touch</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="isb-support-box bg-white text-center ptb-50 rounded-12 mt-20">
                                                        <img src="assets/img/support4.png" alt="" class="isb-support-image">
                                                        <h6 class="text-black fs-20 mt-20">Discord</h6>
                                                        <p class="fs-14 text-black">@username</p>
                                                        <a href="#" class="btn isb-small-btn fs-hover-style text-black border-dark mt-10">Get
                                                            in
                                                            Touch</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="position-absolute shape-1 isb-rotate-animation img-fluid z--1" src="assets/img/home_19/shape/support.png" alt="">
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