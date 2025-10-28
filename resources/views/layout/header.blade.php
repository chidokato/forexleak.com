        <!--header area start-->
        <!-- <div class="topbar">
            <div class="container">
                <div class="row align-item-center">
                    <div class="col-md-6">
                        <div class="topbar-left position-relative z-3">
                            <p class="mb-0 csh-color-two">Get 50% Discount Offer <mark class="csh-color">26 Days</mark></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="topbar-right text-end position-relative z-3">
                            <a href="" class="csh-color-two">Login / Sign up</a>
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="topbar d-block d-lg-block">
            <div class="container">
                <div class="row align-item-center">
                    <div class="col-2 col-md-0 flex-center d-lg-none">
                        <button class="mobile-menu-toggle border-0 d-block d-lg-none bg-transparent text-white mr-20"><i class="fa-solid fa-bars"></i></button>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="logo-wrapper">
                            <a href="{{asset('')}}"><img src="https://forexunlocker.com/data/images/vector-smart-object-01.png" alt="logo" class="logo"></a>
                            <!-- <a href="{{asset('')}}"><img src="data/images/{{$setting->img}}" alt="logo" class="logo"></a> -->
                        </div>
                    </div>
                    <div class="col-md-7 flex-center d-none d-lg-block">
                        <div class="topserach">
                            <select>
                                <option>All</option>
                                <option>EXPERT ADVISOR</option>
                            </select>
                            <input type="" name="" placeholder="Search any Expert, Indicator, you need here..... If you can't find, Please message us! ( Best price )">
                            <button class="host-fs-btn-bg border-0"><i class="fa fa-search " aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="col-md-2 col-4 flex-center">
                        <div class="topbar-right text-end position-relative z-3">
                            <a href="" class="csh-color-two">Login</a>
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <header class="header-style-4 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 ">
                        <div class="nav-menu-4 nav-wrapper">
                            <nav>
                                <ul>
                                    @include('partials.menu-megamenu', ['menus' => $menu])
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--header area end-->


        <!--mobile menu start-->
        <div class="mobile-menu position-fixed bg-white deep-shadow">
            <button class="close-menu position-absolute"><i class="fa-solid fa-xmark"></i></button>
            <a href="{{asset('')}}" class="logo-wrapper"><img src="data/images/{{$setting->img}}" alt="logo" class="logo logo-black"></a>
            <a href="{{asset('')}}" class="logo-wrapper"><img src="data/images/{{$setting->img}}" alt="logo" class="logo logo-white"></a>
            <nav class="mobile-menu-wrapper mt-40">
                <ul>
                    @include('partials.menu-megamenu-mobi', ['menus' => $menu])

                    
                </ul>
            </nav>

            <!-- <div class="contact-info mt-60">
                <h4 class="mb-20">Contact Info</h4>
                <p>Chicago 12, Melborne City, USA</p>
                <p>+88 01682648101</p>
                <p>info@example.com</p>
                <div class="contact-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div> -->
        </div>
        <!--mobile menu end-->