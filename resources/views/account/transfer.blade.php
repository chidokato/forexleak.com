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
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                @if($url == 'bank')
                                    <ul class="bank-information">
                                        <li>Bank: </li>
                                        <li>Account Number: </li>
                                        <li>Beneficiary Name: </li>
                                        <li>Transfer content: </li>
                                    </ul>
                                @elseif($url == 'ctypto')
                                    <select id="network" class="template-btn ctypto-buton">
                                        <option value="trc20">Tron (TRC20)</option>
                                        <option value="bep20">BNB Smart Chain (BEP20)</option>
                                    </select>
                                    <ul class="bank-information" id="crypto-info">
                                        <li id="crypto-name"></li>
                                        <li class="d-flex align-items-center">
                                            <span id="crypto-address" class="me-2"></span>
                                            <button id="copy-address" class="btn btn-sm btn-outline-light">Copy</button>
                                        </li>
                                    </ul>
                                    <div id="toast-copy" class="toast-copy">Copied!</div>
                                @endif

                                <div class="footer-widget footer-sb-widget mt-2">
                                    <h5 class="text-white position-relative mb-4 widget-title">Deposit amount</h5>
                                    <form action="{{ route('account.deposits.store') }}" method="post" class="footer-sb-form position-relative">
                                        @csrf
                                        @if($url == 'bank')
                                        <input type="hidden" name="methods" value="bank_transfer">
                                        @elseif($url == 'ctypto')
                                        <input type="hidden" name="methods" value="ctypto_transfer">
                                        @endif
                                        <input type="text" name="amount" placeholder="enter the amount" required>
                                        <button type="submit" class="template-btn primary-btn btn-small">Start loading</button>
                                    </form>
                                </div>

                                <p class="mt-2">
                                    You will have 10 minutes to complete the deposit process...
                                </p>

                            </div>

                            <!-- ẢNH Ở NGOÀI NHƯ BẠN MUỐN -->
                            <div class="col-lg-5 col-md-5">
                                <div class="img">
                                    <img id="crypto-img" src="" class="width100">
                                </div>
                            </div>
                        </div>

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


@section('js')
<script>
    const data = {
    trc20: {
        img: "{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlTWf74Rtl6747xTtb680Kl0gp90KQ4VnH2g&s') }}",
        name: "Tron (TRC20)",
        address: "TTS89dsfdsa854954dsfdsfdsaf"
    },
    bep20: {
        img: "{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlTWf74Rtl6747xTtb680Kl0gp90KQ4VnH2g&s') }}",
        name: "BNB Smart Chain (BEP20)",
        address: "0x3495834958fdas95435fdsafda"
    }
};

$("#network").on("change", function () {
    const v = $(this).val();
    $("#crypto-img").attr("src", data[v].img);
    $("#crypto-name").text(data[v].name);
    $("#crypto-address").text(data[v].address);
});

// Copy button
$(document).on("click", "#copy-address", function () {
    let text = $("#crypto-address").text();
    navigator.clipboard.writeText(text).then(function () {

        let toast = $("#toast-copy");
        toast.text("Copied: " + text);

        toast.addClass("show");

        setTimeout(() => {
            toast.removeClass("show");
        }, 2000);
    });
});


// chạy lần đầu
$("#network").trigger("change");



</script>
@endsection