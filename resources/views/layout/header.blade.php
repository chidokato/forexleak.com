        <!--header area start-->
        <header class="header-style-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-5">
                        <div class="logo-wrapper">
                            <a href="{{asset('')}}"><img src="data/images/{{$setting->img}}" alt="logo" class="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                        <div class="nav-menu-4 nav-wrapper">
                            <nav>
                                <ul>
                                    @include('partials.menu-megamenu', ['menus' => $menu])
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-7">
                        <div class="sh-header-right d-flex align-items-center justify-content-end">
                            <div class="sh-header-search wrapper dropdown ms-1">
                                <button class="sh-header-search border-0 bg-transparent text-white" data-bs-toggle="dropdown"><i
                                  class="fa-solid fa-magnifying-glass"></i></button>
                                <div class="dropdown-menu dropdown-menu-end bg-transparent border-0">
                                    <form class="header-search-form" action="#">
                                        <input type="text" placeholder="Search....">
                                        <input type="submit" value="Go">
                                    </form>
                                </div>
                            </div>
                            <div class="sh-header-btn ml-40 flex-shrink-0 position-relative d-none d-sm-block footer-widget">
                                <ul class="social-nav">
                                    <li><a href="#" class="rounded-circle overflow-hidden position-relative d-flex align-items-center justify-content-center text-white"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="rounded-circle overflow-hidden position-relative d-flex align-items-center justify-content-center text-white"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                            <button class="mobile-menu-toggle d-block d-lg-none border-0 bg-transparent text-white ml-20"><i
                              class="fa-solid fa-bars"></i></button>
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