@extends('Home::layouts.master')

@section('title','پروفایل کاربری', $user->name)

@section('content')
    <main class="position-relative">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-2 d-none d-lg-block"></div>
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
                    <div class="entry-main-content mt-50">
                        <h1 class="mt-30">ویرایش پروفایل کاربری</h1>
                        <hr class="wp-block-separator is-style-wide">
                        <form class="form-contact comment_form" action="#" id="commentForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text" placeholder="نام">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email" placeholder="ایمیل">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="website" id="website" type="text" placeholder="شماره تماس">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="پیام"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm">ارسال پیام</button>
                            </div>
                        </form>
                    </div>
                    <div class="entry-bottom mt-50 mb-30">
                        <div class="overflow-hidden mt-30">
                            <div class="single-social-share float-right">
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
                </div>
            </div>
            <!--End row-->
            <div class="row">
                <div class="col-12 text-center mb-50">
                    <a href="#">
                        <img class="d-inline border-radius-10" src="assets/imgs/ads.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </main>

@endsection
