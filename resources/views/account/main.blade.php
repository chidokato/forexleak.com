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
                                    <li><a href="account/main"><button class="active"><i class="fa-solid fa-circle-user"></i><span class="ms-3">My Account</span></button></a></li>
                                    <li><a href="account/deposit"><button><i class="fa-solid fa-wallet"></i><span class="ms-3">Deposit</span></button></a></li>
                                    <li><button><i class="fa-solid fa-clock-rotate-left"></i><span class="ms-3">Purchase history</span></button></li>
                                    <li><button><i class="fa-solid fa-briefcase"></i><span class="ms-3">My trading account</span></button></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content mt-1 mt-lg-0">
                                    <div class="accordion hm2-accordion deep-shadow bg-white">
                                        <h4 class="">Balance: <span>${{$user->balance?$user->balance:'0'}}</span></h4>
                        <hr>
                                        <div class="hm-contact-form " id="contact">
                                            <form action="#" method="POST" id="contactForm" class="contact-us-form">
                                                <div class="row justify-content-center">
                                                        <div class="row g-2">
                                                            <div class="col-md-6">
                                                                <div class="input-field">
                                                                    <label for="name">Your name</label>
                                                                    <input type="text" value="{{$user->name}}" class="" name="name" id="name" placeholder="Enter name" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-field">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" readonly class="" value="{{$user->email}}" name="email" id="email" placeholder="Enter email" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-field">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="text" class="" value="{{$user->phone}}" name="phone" id="phone" placeholder="Enter phone" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-field">
                                                                    <label for="subject">Facebook</label>
                                                                    <input type="text" class="" name="subject" value="{{$user->facebook}}" id="subject" placeholder="Enter subject" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="input-field">
                                                                    <label for="message">About</label>
                                                                    <textarea placeholder="Write Message" rows="5" name="message" id="message"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="submit-btn text-center mt-4">
                                                    <button type="submit" class="template-btn primary-btn border-0 rounded-pill">SAVE<i class="fa-solid fa-chevron-right ms-2"></i></button>
                                                </div>
                                            </form>
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