@extends('Home::layouts.master')

@section('title','نویسنده'.$author->name)

@section('content')
    <main class="position-relative">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-2 d-none d-lg-block"></div>
                <!-- main content -->
                <div class="col-lg-8 col-md-12">
                    <div class="author-bio border-radius-10 bg-white p-30 mb-50">
                        <div class="author-image mb-30">
                            <a href="author.html"><img src="assets/imgs/authors/author.png" alt="" class="avatar"></a></div>
                        <div class="author-info">
                            <h3><span class="vcard author"><span class="fn"><a href="author.html" title="پست های مسعود" rel="author">مسعود راستی</a></span></span></h3>
                            <h5 class="text-muted">
                                <span class="ml-15">نویسنده نخبه</span>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            </h5>
                            <div class="author-description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد.</div>
                            <a href="author.html" class="author-bio-link text-muted"><span class="ml-5 font-x-small"><ion-icon name="person-add"></ion-icon></span>این نویسنده را دنبال کنید</a>
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
                    <h2>همه پست های مسعود</h2>
                    <hr class="wp-block-separator is-style-wide">
                    <div class="latest-post mb-50">
                        <div class="loop-list-style-1">
                            <article class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                    <span class="top-right-icon bg-dark"><i class="mdi mdi-flash-on"></i></span>
                                    <a href="single.html">
                                        <img src="assets/imgs/news-21.jpg" alt="post-slider">
                                    </a>
                                </div>
                                <div class="pr-10 pl-10">
                                    <div class="entry-meta mb-30">
                                        <a class="entry-meta meta-0" href="category.html"><span class="post-in background2 text-primary font-x-small">دکوراسیون منزل</span></a>
                                        <div class="float-left font-small">
                                            <span><span class="ml-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8 هزار</span>
                                            <span class="mr-30"><span class="ml-10 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>
                                            <span class="mr-30"><span class="ml-10 text-muted"><i class="fa fa-share-alt" aria-hidden="true"></i></span>125 هزار</span>
                                        </div>
                                    </div>
                                    <h4 class="post-title mb-20">
                                            <span class="post-format-icon">
                                                <ion-icon name="headset-outline"></ion-icon>
                                            </span>
                                        <a href="single.html">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام</a></h4>
                                    <p class="post-exerpt font-medium text-muted mb-30">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                                    <div class="mb-20 overflow-hidden">
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                            <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                            <span class="post-on">در 18/9/1400 09:35</span>
                                            <span class="time-reading">12 دقیقه خوانده شد</span>
                                            <p class="font-x-small mt-10">آپدیت 18/9/1400 10:28</p>
                                        </div>
                                        <div class="float-left">
                                            <a href="single.html" class="read-more"><span class="ml-10"><i class="fa fa-thumbtack" aria-hidden="true"></i></span>انتخاب شده توسط ویراستار</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img class="border-radius-15" src="assets/imgs/thumbnail-15.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <div class="entry-meta mb-15 mt-10">
                                            <a class="entry-meta meta-2" href="category.html"><span class="post-in text-danger font-x-small">سیاسی</span></a>
                                        </div>
                                        <h5 class="post-title mb-15 text-limit-2-row">
                                                <span class="post-format-icon">
                                                    <ion-icon name="videocam-outline"></ion-icon>
                                                </span>
                                            <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</a></h5>
                                        <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                            <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                            <span class="post-on">در 15/9/1400 07:00</span>
                                            <span class="time-reading">12 دقیقه خوانده شد</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img class="border-radius-15" src="assets/imgs/thumbnail-13.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <div class="entry-meta mb-15 mt-10">
                                            <a class="entry-meta meta-2" href="category.html"><span class="post-in text-warning font-x-small">ورزشی</span></a>
                                        </div>
                                        <h5 class="post-title mb-15 text-limit-2-row">
                                            <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</a></h5>
                                        <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                            <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                            <span class="post-on">در 15/9/1400 07:00</span>
                                            <span class="time-reading">14 دقیقه خوانده شد</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <div class="mb-30 text-center pl-50 pr-50">
                                <a href="#">
                                    <img class="border-radius-10 d-inline" src="assets/imgs/ads.jpg" alt="post-slider">
                                </a>
                            </div>
                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img class="border-radius-15" src="assets/imgs/thumbnail-16.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <div class="entry-meta mb-15 mt-10">
                                            <a class="entry-meta meta-2" href="category.html"><span class="post-in text-success font-x-small">سلامتی</span></a>
                                        </div>
                                        <h5 class="post-title mb-15 text-limit-2-row">
                                                <span class="post-format-icon">
                                                    <ion-icon name="image-outline"></ion-icon>
                                                </span>
                                            <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</a></h5>
                                        <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                            <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                            <span class="post-on">در 15/9/1400 07:00</span>
                                            <span class="time-reading">6 دقیقه خوانده شد</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img class="border-radius-15" src="assets/imgs/thumbnail-8.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <div class="entry-meta mb-15 mt-10">
                                            <a class="entry-meta meta-2" href="category.html"><span class="post-in text-info font-x-small">درگیری ها</span></a>
                                        </div>
                                        <h5 class="post-title mb-15 text-limit-2-row">
                                                <span class="post-format-icon">
                                                    <ion-icon name="chatbox-outline"></ion-icon>
                                                </span>
                                            <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</a></h5>
                                        <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                            <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                            <span class="post-on">در 15/9/1400 07:00</span>
                                            <span class="time-reading">13 دقیقه خوانده شد</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img class="border-radius-15" src="assets/imgs/thumbnail-9.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <div class="entry-meta mb-15 mt-10">
                                            <a class="entry-meta meta-2" href="category.html"><span class="post-in text-success font-x-small">سیاسی</span></a>
                                        </div>
                                        <h5 class="post-title mb-15 text-limit-2-row">
                                                <span class="post-format-icon">
                                                    <ion-icon name="chatbox-outline"></ion-icon>
                                                </span>
                                            <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</a></h5>
                                        <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                            <span class="post-by">توسط <a href="author.html">مسعود راستی</a></span>
                                            <span class="post-on">در 15/9/1400 07:00</span>
                                            <span class="time-reading">12 دقیقه خوانده شد</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
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
            </div>
        </div>
    </main>
@endsection
