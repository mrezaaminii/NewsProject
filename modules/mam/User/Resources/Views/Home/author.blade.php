@extends('Home::layouts.master')

@section('title','نویسنده '.$author->name)

@section('content')
    <main class="position-relative">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-2 d-none d-lg-block"></div>
                <!-- main content -->
                <div class="col-lg-8 col-md-12">
                    <div class="author-bio border-radius-10 bg-white p-30 mb-50">
                        <div class="author-image mb-30">
                            <a href="#">
                                <img src="{{ $author->getImage() }}" alt="" class="avatar">
                            </a>
                        </div>
                        <div class="author-info">
                            <h3>
                                <span class="vcard author">
                                    <span class="fn">
                                        <a href="#" title="پست های {{ $author->name }}" rel="author">{{ $author->name }}</a>
                                    </span>
                                </span>
                            </h3>
                            <h5 class="text-muted">
                                <span class="ml-15">نویسنده نخبه</span>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            </h5>
                            <div class="author-description">{{ $author->bio }}</div>
                            <a href="author.html" class="author-bio-link text-muted"><span class="ml-5 font-x-small"><ion-icon name="person-add"></ion-icon></span>این نویسنده را دنبال کنید</a>
                            <div class="author-social">
                                <ul class="author-social-icons">
                                    <li class="author-social-link-facebook">
                                        <a href="#" target="_blank">
                                            <i class="ti-facebook"></i>
                                        </a>
                                        </li>
                                    <li class="author-social-link-twitter">
                                        <a href="#" target="_blank">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>

                                    <li class="author-social-link-pinterest">
                                        <a href="#" target="_blank">
                                            <i class="ti-pinterest"></i>
                                        </a>
                                    </li>
                                    <li class="author-social-link-instagram">
                                        <a href="#" target="_blank">
                                            <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h2>همه پست های {{ $author->name }}</h2>
                    <hr class="wp-block-separator is-style-wide">
                    <div class="latest-post mb-50">
                        <div class="loop-list-style-1">
                            @foreach($articles as $article)
                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                        <a class="color-white" href="{{ $article->getPath() }}">
                                            <img class="border-radius-15" src="{{ asset('storage/'.$article->imagePath) }}" alt="{{ $article->title }}">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <div class="entry-meta mb-15 mt-10">
                                            <a class="entry-meta meta-2" href="{{ $article->category?->getPath() }}">
                                                <span class="post-in text-danger font-x-small">
                                                    {{ $article->category?->title }}
                                                </span>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-15 text-limit-2-row">
                                            <a href="{{ $article->getPath() }}">
                                                {{ $article->title }}
                                            </a>
                                        </h5>
                                        <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                            {{ \Illuminate\Support\Str::limit($article->body,100) }}
                                        </p>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                            <span class="post-by">توسط <a href="author.html">{{ $author->name }}</a></span>
                                            <span class="post-on">{{ $article->created_at->diffForHumans() }}</span>
                                            <span class="time-reading">{{ $article->time_to_read }} دقیقه خوانده شد</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination-area mb-30">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
