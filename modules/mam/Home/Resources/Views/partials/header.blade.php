<header class="main-header header-style-2 mb-40">
    <div class="header-bottom header-sticky background-white text-center">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-none d-lg-block">
                        <a href="{{ route('home.index') }}">
                            <img class="logo-img d-inline" src="{{ asset('assets/imgs/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href="{{ route('home.index') }}">
                            <img class="logo-img d-inline" src="{{ asset('assets/imgs/logo.svg') }}" alt="image logo">
                        </a>
                    </div>
                    <div class="logo-mobile d-block d-md-none">
                        <a href="{{ route('home.index') }}">
                            <img class="logo-img d-inline" src="{{ asset('assets/imgs/favicon.svg') }}" alt="favorite icon">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <!-- Main-menu -->
                    <div class="main-nav text-right float-lg-right float-md-left">
                        <ul class="mobi-menu d-none menu-3-columns" id="navigation">
                            <li class="cat-item cat-item-2"><a href="#">اقتصاد جهانی</a></li>
                            <li class="cat-item cat-item-3"><a href="#">محیط</a></li>
                            <li class="cat-item cat-item-4"><a href="#">سلامت کودکان</a></li>
                            <li class="cat-item cat-item-5"><a href="#">مد</a></li>
                            <li class="cat-item cat-item-6"><a href="#">توریست</a></li>
                            <li class="cat-item cat-item-7"><a href="#">درگیری ها</a></li>
                            <li class="cat-item cat-item-2"><a href="#">رسوایی ها</a></li>
                            <li class="cat-item cat-item-2"><a href="#">اجرایی</a></li>
                            <li class="cat-item cat-item-2"><a href="#">سیاست خارجی</a></li>
                            <li class="cat-item cat-item-2"><a href="#">زندگی سالم</a></li>
                            <li class="cat-item cat-item-3"><a href="#">تحقیقات پزشکی</a></li>
                            <li class="cat-item cat-item-4"><a href="#">سلامت کودکان</a></li>
                            <li class="cat-item cat-item-5"><a href="#">سراسر دنیا</a></li>
                            <li class="cat-item cat-item-6"><a href="#">انتخاب آگهی</a></li>
                            <li class="cat-item cat-item-7"><a href="#">سلامت روان</a></li>
                            <li class="cat-item cat-item-2"><a href="#">روابط رسانه ای</a></li>
                        </ul>
                        <nav>
                            <ul class="main-menu d-none d-lg-inline">
                                <li>
                                    <a href="{{ route('home.index') }}">
                                        خانه
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('articles.home') }}">
                                        مقالات
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('home.index') }}">
                                        نویسندگان
                                    </a>
                                </li>
                                <li class="mega-menu-item">
                                    <a href="#">
                                        دسته بندی ها
                                    </a>
                                    <div class="sub-mega-menu sub-menu-list row text-muted font-small">
                                        <ul class="col-md-2">
                                            <li><a href="category.html">دسته بندی لیستی</a></li>
                                        </ul>

                                    </div>
                                </li>
                                @auth
                                    <li>
                                        <a href="{{route('auth.logout')}}">
                                                <span class="ml-15">
                                                    <ion-icon name="mail-unread-outline"></ion-icon>
                                                </span>
                                            خروج
                                        </a>
                                    </li>
                                @endauth
                                @guest
                                    <li>
                                        <a href="{{route('auth.register')}}">
                                                <span class="ml-15">
                                                    <ion-icon name="mail-unread-outline"></ion-icon>
                                                </span>
                                            ثبت نام
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('login')}}">
                                                <span class="ml-15">
                                                    <ion-icon name="mail-unread-outline"></ion-icon>
                                                </span>
                                            ورود
                                        </a>
                                    </li>
                                @endguest
                            </ul>
                            <div class="d-inline mr-50 tools-icon">
                                <a class="red-tooltip text-danger" href="#" data-toggle="tooltip"
                                   data-placement="top" title="" data-original-title="موضوعات جدید">
                                    <ion-icon name="flame-outline"></ion-icon>
                                </a>
                                <a class="red-tooltip text-primary" href="#" data-toggle="tooltip"
                                   data-placement="top" title="" data-original-title="پربازدید">
                                    <ion-icon name="flash-outline"></ion-icon>
                                </a>
                                <a class="red-tooltip text-success" href="#" data-toggle="tooltip"
                                   data-placement="top" title="" data-original-title="اطلاعیه">
                                    <ion-icon name="notifications-outline"></ion-icon>
                                    <span class="notification bg-success">5</span>
                                </a>
                            </div>
                        </nav>
                    </div>
                    <!-- Search -->
                    <form action="#" method="get"
                          class="search-form d-lg-inline float-left position-relative ml-30 d-none">
                        <input type="text" class="search_field" placeholder="جستجو ..." value="" name="s">
                        <span class="search-icon"><i class="ti-search mr-5"></i></span>
                    </form>
                    <!-- Off canvas -->
                    <div class="off-canvas-toggle-cover">
                        <div class="off-canvas-toggle hidden d-inline-block mr-15" id="off-canvas-toggle">
                            <ion-icon name="grid-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
