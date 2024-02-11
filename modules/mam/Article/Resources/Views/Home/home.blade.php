@extends('Home::layouts.master')

@section('title','مقالات')

@section('content')
    <main class="position-relative">
        <div class="archive-header text-center mb-50">
            <div class="container">
                <h2><span class="text-danger">مقالات</span></h2>
                <div class="breadcrumb">
                    <span class="no-arrow">شما الان اینجا هستید::</span>
                    <a href="{{ route('home.index') }}" rel="nofollow">خانه</a>
                    <span></span>
                    مقالات
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- main content -->
                <div class="col-lg-12 col-md-9 order-1 order-md-2">
                    <div class="row mb-50">
                        <div class="col-lg-8 col-md-12">
                            <div class="latest-post mb-50">
                                <div class="loop-grid">
                                    <div class="row">
                                        @foreach($articles as $article)
                                        <article class="col-lg-6 col-md-12 wow fadeIn animated">
                                            <div class="background-white border-radius-10 p-10 mb-30">
                                                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                    <a href="{{ $article->getPath() }}">
                                                        <img class="border-radius-15"
                                                             src="{{ asset('storage/'.$article->imagePath) }}"
                                                             alt="{{ $article->title }}">
                                                    </a>
                                                </div>
                                                <div class="pl-10 pr-10">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2"
                                                           href="{{ $article->category->getPath() }}">
                                                            <span class="post-in text-primary
                                                            font-x-small">{{ $article->category?->title }}</span>
                                                        </a>
                                                    </div>
                                                    <h5 class="post-title mb-15">
                                                        <a href="{{ $article->getPath() }}">
                                                            {{ \Illuminate\Support\Str::limit($article->title,70) }}
                                                        </a>
                                                    </h5>
                                                    <p class="post-exerpt font-medium text-muted mb-30">
                                                        {{ \Illuminate\Support\Str::limit($article->body) }}
                                                    </p>
                                                    <div class="entry-meta meta-1 font-x-small color-grey
                                                     float-right text-uppercase mb-10">
                                                        <span class="post-by">توسط <a
                                                                href="{{ $article->user->getPath() }}">
                                                                {{ $article->user?->name }}
                                                            </a>
                                                        </span>
                                                        <span class="post-on">
                                                            {{ $article->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-area mb-30">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 sidebar-right">
                            <div class="sidebar-widget mb-50">
                                <div class="widget-header mb-30 bg-white border-radius-10 p-15">
                                    <h5 class="widget-title mb-0">پرطرفدارترین ها</h5>
                                </div>
                                <div class="post-aside-style-2">
                                    <ul class="list-post">
                                        <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/thumbnail-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h6>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">رضا کیمیا</a></span>
                                                        <span class="post-on">4 دقیقه پیش</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/thumbnail-3.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</a></h6>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">سعید شمس</a></span>
                                                        <span class="post-on">3 ساعت پیش</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/thumbnail-5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">سه درصد گذشته، حال و آینده شناخت فراوان</a></h6>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">الناز روستایی</a></span>
                                                        <span class="post-on">4 ساعت پیش</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/thumbnail-7.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد</a></h6>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">بهمن راستی</a></span>
                                                        <span class="post-on">5 ساعت پیش</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/thumbnail-8.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی</a></h6>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                        <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                                        <span class="post-on">5 ساعت پیش</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget widget_newsletter border-radius-10 p-20 bg-white mb-50">
                                <div class="widget-header widget-header-style-1 position-relative mb-15">
                                    <h5 class="widget-title">خبرنامه</h5>
                                </div>
                                <div class="newsletter">
                                    <p class="font-medium">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                                    <form target="_blank" action="#" method="get" class="subscribe_form relative mail_part">
                                        <div class="form-newsletter-cover">
                                            <div class="form-newsletter position-relative">
                                                <input type="email" name="EMAIL" placeholder="ایمیل خود را اینجا وارد کنید" required="">
                                                <button type="submit">
                                                    <i class="ti ti-email"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated">
                                <div class="widget-header mb-30">
                                    <h5 class="widget-title">آخرین <span>نظرات</span></h5>
                                </div>
                                <div class="post-block-list post-module-6">
                                    <div class="last-comment mb-20 d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="مرجان - 985 پست"><img src="assets/imgs/authors/author-14.png" alt=""></a>
                                            </span>
                                        <div class="alith_post_title_small">
                                            <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان.</a></p>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-by">توسط <a href="author.html">مرجان همتی</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="last-comment d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="بهمن - 1245 پست"><img src="assets/imgs/authors/author-9.png" alt=""></a>
                                            </span>
                                        <div class="alith_post_title_small">
                                            <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان</a></p>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                <span class="post-by">توسط <a href="author.html">بهمن راستی</a></span>
                                                <span class="post-on">4 دقیقه پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="last-comment d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="مسعود - 445 پست"><img src="assets/imgs/authors/author-3.png" alt=""></a>
                                            </span>
                                        <div class="alith_post_title_small">
                                            <p class="font-medium mb-10"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</a></p>
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
            </div>
        </div>
    </main>
@endsection
