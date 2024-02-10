@extends('Home::layouts.master')

@php
use App\Helper\Helper;
@endphp

@section('title',$article->title)

 @section('content')
    <main class="position-relative">
        <div class="container">
            <div class="entry-header entry-header-1 mb-30 mt-50">
                <div class="entry-meta meta-0 font-small mb-30"><a href="category.html"><span class="post-cat bg-success color-white">اخبار جهان</span></a></div>
                <h1 class="post-title mb-30">
                    {{ $article->title }}
                </h1>
                <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                    <span class="post-by">توسط <a href="author.html">{{ $article->user?->name }} </a></span>
                    <span class="post-on">ارسال در {{ Helper::convertEnglishToPersian(jdate($article->created_at)) }}</span>
                    <span class="time-reading">زمان خواندن {{ $article->time_to_read }} دقیقه</span>
                    <p class="font-x-small mt-10">
                        <span class="hit-count"><i class="ti-comment ml-5"></i>نظرات {{ $article->comments->count() }}</span>
                        <span class="hit-count"><i class="ti-heart ml-5"></i>لایک {{ $article->likers()->count() }}</span>
                        <span class="hit-count"><i class="ti-star ml-5"></i>امتیاز {{ $article->score }}</span>
                    </p>
                </div>
            </div>
            <!--end entry header-->
            <div class="row mb-50">
                <div class="col-lg-8 col-md-12">
                    <div class="single-social-share single-sidebar-share mt-30">
                        <ul>
                            <li><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                            <li><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                            <li><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                            <li><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                            <li><a class="social-icon email-icon text-xs-center" target="_blank" href="#"><i class="ti-email"></i></a></li>
                        </ul>
                    </div>
                    <div class="bt-1 border-color-1 mb-30"></div>
                    <figure class="single-thumnail mb-30">
                        <img src="{{ asset('storage/'.$article->imagePath) }}" alt="{{ $article->title }}">
                    </figure>
                    <div class="entry-main-content">
                        <h2>توضیحات</h2>
                        <hr class="wp-block-separator is-style-wide">
                        <p>{{ $article->description }}</p>
                        <div class="overflow-hidden mt-30">
                            <div class="tags float-right text-muted mb-md-30">
                                <span class="font-small ml-10"><i class="fa fa-tag ml-5"></i>برچسب ها: </span>
                                <a href="category.html" rel="tag">فناوری</a>
                                <a href="category.html" rel="tag">جهان</a>
                                <a href="category.html" rel="tag">جهانی</a>
                            </div>
                            <div class="single-social-share float-left">
                                <ul class="d-inline-block list-inline">
                                    <li class="list-inline-item"><span class="font-small text-muted"><i class="ti-sharethis ml-5"></i>اشتراک: </span></li>
                                    <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--author box-->
                    <div class="author-bio border-radius-10 bg-white p-30 mb-40">
                        <div class="author-image mb-30">
                            <a href="author.html"><img src="assets/imgs/authors/author.png" alt="" class="avatar"></a></div>
                        <div class="author-info">
                            <h3><span class="vcard author"><span class="fn"><a href="author.html" title="Posts by Robert" rel="author">سعید شمس</a></span></span></h3>
                            <h5 class="text-muted">
                                <span class="ml-15">نویسنده نخبه</span>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            </h5>
                            <div class="author-description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز. </div>
                            <a href="author.html" class="author-bio-link text-muted">مشاهده همه پست ها</a>
                            <div class="author-social">
                                <ul class="author-social-icons">
                                    <li class="author-social-link-facebook"><a href="#" target="_blank"><i class="ti-facebook"></i></a></li>
                                    <li class="author-social-link-twitter"><a href="#" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                                    <li class="author-social-link-pinterest"><a href="#" target="_blank"><i class="ti-pinterest"></i></a></li>
                                    <li class="author-social-link-instagram"><a href="#" target="_blank"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--related posts-->
                        @include('Article::Home.details-partials.related-posts',['related_articles' => $related_articles])
                    <!--Comments-->
                    <div class="comments-area">
                        <h3 class="mb-30">3 نظرات</h3>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/imgs/authors/author-2.png" alt="">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی.
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#">الناز روستایی</a>
                                                </h5>
                                                <p class="date">4 فروردین 1400 ساعت 3:12 بعد از ظهر </p>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/imgs/authors/author-3.png" alt="">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#">سعید شمس</a>
                                                </h5>
                                                <p class="date">4 فروردین 1400 ساعت 3:12 بعد از ظهر </p>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/imgs/authors/author-16.png" alt="">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل.
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#">مهتاب رضایی</a>
                                                </h5>
                                                <p class="date">4 فروردین 1400 ساعت 3:12 بعد از ظهر </p>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--comment form-->
                    @include('Article::Home.details-partials.create-comment')
                </div>
                <!--End col-lg-8-->
                @include('Article::Home.details-partials.sidebar-left',['homeRepository' => $homeRepository])
                <!--End col-lg-4-->
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-12 text-center mb-50">
                    <a href="#">
                        <img class="border-radius-10 d-inline" src="assets/imgs/ads-3.png" alt="">
                    </a>
                </div>
            </div>
            <div class="row mb-50">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sidebar-widget mb-md-30">
                        <div class="widget-header mb-30">
                            <h5 class="widget-title">پرطرفدارترین ها</h5>
                        </div>
                        <div class="post-aside-style-2">
                            <ul class="list-post">
                                <li class="mb-30 wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-12.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-30 wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-13.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                                <span class="post-on">3 ساعت قبل</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-15.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                                <span class="post-on">4 ساعت قبل</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sidebar-widget mb-md-30">
                        <div class="widget-header mb-30">
                            <h5 class="widget-title">انتخاب <span>ویرایشگر</span></h5>
                        </div>
                        <div class="post-aside-style-1 border-radius-10 p-20 bg-white">
                            <ul class="list-post">
                                <li class="mb-20">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</a></h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-20">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-15.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a></h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-20">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-16.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</a></h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-15.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a></h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sidebar-widget mb-sm-30">
                        <div class="widget-header mb-30">
                            <h5 class="widget-title">محبوب ترین</h5>
                        </div>
                        <div class="post-aside-style-2">
                            <ul class="list-post">
                                <li class="mb-30 wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-30 wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                                <span class="post-on">3 ساعت قبل</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                                    <div class="d-flex">
                                        <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                            <a class="color-white" href="single.html">
                                                <img src="assets/imgs/thumbnail-5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای</a></h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                                <span class="post-on">4 ساعت قبل</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget-header mb-30">
                        <h5 class="widget-title">آخرین <span>نظرات</span></h5>
                    </div>
                    <div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn  animated">
                        <div class="post-block-list post-module-6">
                            <div class="last-comment mb-20 d-flex wow fadeIn">
                                    <span class="item-count vertical-align">
                                        <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Azumi - 985 posts"><img src="assets/imgs/authors/author-14.png" alt=""></a>
                                    </span>
                                <div class="alith_post_title_small">
                                    <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان.</a></p>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                        <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                        <span class="post-on">4 دقیقه پیش</span>
                                    </div>
                                </div>
                            </div>
                            <div class="last-comment d-flex wow fadeIn">
                                    <span class="item-count vertical-align">
                                        <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Johny - 445 posts"><img src="assets/imgs/authors/author-3.png" alt=""></a>
                                    </span>
                                <div class="alith_post_title_small">
                                    <p class="font-medium mb-10"><a href="single.html">سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان.</a></p>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                        <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                        <span class="post-on">4 دقیقه پیش</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
<div class="dark-mark"></div>
