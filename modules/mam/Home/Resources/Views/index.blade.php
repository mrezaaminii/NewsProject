@extends('Home::layouts.master')

@section('title','صفحه اصلی')


@section('content')
    <main class="position-relative">
        @include('Home::portions.post-carausel',['vip_posts' => $homeRepository])
        <div class="container">
            <!--Ads-->
            @include('Home::portions.home-ads')
            <!--Content-->
            <div class="row">
                <!-- sidebar-left -->
                @include('Home::portions.sidebar-left')
                <!-- main content -->
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row">
                        @include('Home::portions.news-posts')
                        @include('Home::portions.sidebar-right')
                    </div>
{{--                    <div class="row mb-50 mt-15">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="widget-header position-relative mb-30">--}}
{{--                                <h4 class="widget-title mb-0">از <span>وبلاگ</span></h4>--}}
{{--                            </div>--}}
{{--                            <div class="post-carausel-2 post-module-1 row">--}}
{{--                                <div class="col">--}}
{{--                                    <div class="post-thumb position-relative">--}}
{{--                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative"--}}
{{--                                             style="background-image: url(assets/imgs/thumbnail-7.jpg)">--}}
{{--                                            <a class="img-link" href="single.html"></a>--}}
{{--                                            <div class="post-content-overlay">--}}
{{--                                                <div class="entry-meta meta-0 font-small mb-15">--}}
{{--                                                    <a href="category.html"><span--}}
{{--                                                            class="post-cat bg-success color-white">سفر</span></a>--}}
{{--                                                </div>--}}
{{--                                                <h5 class="post-title">--}}
{{--                                                    <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با--}}
{{--                                                        تولید سادگی نامفهوم از صنعت چاپ و با استفاده</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">--}}
{{--                                                    <span><span class="ml-5"><i class="fa fa-eye"--}}
{{--                                                                                aria-hidden="true"></i></span>5.8 هزار</span>--}}
{{--                                                    <span class="mr-15"><span class="ml-5 text-muted"><i--}}
{{--                                                                class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <div class="post-thumb position-relative">--}}
{{--                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative"--}}
{{--                                             style="background-image: url(assets/imgs/thumbnail-8.jpg)">--}}
{{--                                            <a class="img-link" href="single.html"></a>--}}
{{--                                            <div class="post-content-overlay">--}}
{{--                                                <div class="entry-meta meta-0 font-small mb-15">--}}
{{--                                                    <a href="category.html"><span class="post-cat bg-info color-white">زیبایی</span></a>--}}
{{--                                                </div>--}}
{{--                                                <h5 class="post-title">--}}
{{--                                                    <a class="color-white" href="single.html">لورم ایپسوم متن ساختگی با--}}
{{--                                                        تولید سادگی نامفهوم از صنعت چاپ</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">--}}
{{--                                                    <span><span class="ml-5"><i class="fa fa-eye"--}}
{{--                                                                                aria-hidden="true"></i></span>5.8 هزار</span>--}}
{{--                                                    <span class="mr-15"><span class="ml-5 text-muted"><i--}}
{{--                                                                class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <div class="post-thumb position-relative">--}}
{{--                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative"--}}
{{--                                             style="background-image: url(assets/imgs/thumbnail-10.jpg)">--}}
{{--                                            <a class="img-link" href="single.html"></a>--}}
{{--                                            <div class="post-content-overlay">--}}
{{--                                                <div class="entry-meta meta-0 font-small mb-15">--}}
{{--                                                    <a href="category.html"><span--}}
{{--                                                            class="post-cat bg-danger color-white">هنر</span></a>--}}
{{--                                                </div>--}}
{{--                                                <h5 class="post-title">--}}
{{--                                                    <a class="color-white" href="single.html">تایپ به پایان رسد وزمان--}}
{{--                                                        مورد نیاز شامل حروفچینی دستاوردهای</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">--}}
{{--                                                    <span><span class="ml-5"><i class="fa fa-eye"--}}
{{--                                                                                aria-hidden="true"></i></span>5.8 هزار</span>--}}
{{--                                                    <span class="mr-15"><span class="ml-5 text-muted"><i--}}
{{--                                                                class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <div class="post-thumb position-relative">--}}
{{--                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative"--}}
{{--                                             style="background-image: url(assets/imgs/thumbnail-15.jpg)">--}}
{{--                                            <a class="img-link" href="single.html"></a>--}}
{{--                                            <div class="post-content-overlay">--}}
{{--                                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                                    <a href="category.html"><span--}}
{{--                                                            class="post-cat bg-warning color-white">بازی</span></a>--}}
{{--                                                </div>--}}
{{--                                                <h5 class="post-title">--}}
{{--                                                    <a class="color-white" href="single.html">طراحان خلاقی و فرهنگ پیشرو--}}
{{--                                                        در زبان فارسی ایجاد کرد</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">--}}
{{--                                                    <span><span class="ml-5"><i class="fa fa-eye"--}}
{{--                                                                                aria-hidden="true"></i></span>5.8 هزار</span>--}}
{{--                                                    <span class="mr-15"><span class="ml-5 text-muted"><i--}}
{{--                                                                class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <div class="post-thumb position-relative">--}}
{{--                                        <div class="thumb-overlay img-hover-slide border-radius-15 position-relative"--}}
{{--                                             style="background-image: url(assets/imgs/thumbnail-16.jpg)">--}}
{{--                                            <a class="img-link" href="single.html"></a>--}}
{{--                                            <div class="post-content-overlay">--}}
{{--                                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                                    <a href="category.html"><span--}}
{{--                                                            class="post-cat bg-primary color-white">باغچه</span></a>--}}
{{--                                                </div>--}}
{{--                                                <h5 class="post-title">--}}
{{--                                                    <a class="color-white" href="single.html">سه درصد گذشته، حال و آینده--}}
{{--                                                        شناخت فراوان جامعه و متخصصان</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">--}}
{{--                                                    <span><span class="ml-5"><i class="fa fa-eye"--}}
{{--                                                                                aria-hidden="true"></i></span>5.8 هزار</span>--}}
{{--                                                    <span class="mr-15"><span class="ml-5 text-muted"><i--}}
{{--                                                                class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </main>

@endsection
