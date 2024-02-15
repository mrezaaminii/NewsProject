@extends('Home::layouts.master')

@section('title','نویسندگان')

@section('content')
<div class="col-lg-12 col-md-12">
    <div class="latest-post mb-50">
        <div class="loop-grid">
            <div class="row">
                @foreach($authors as $author)
                    <article class="col-lg-3 col-md-6 wow fadeIn animated">
                        <div class="background-white border-radius-10 p-10 mb-30">
                            <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                <a href="{{ $author->getPath() }}">
                                    <img class="border-radius-15 author-img-style"
                                         src="{{ $author->getImage() }}"
                                         alt="{{ $author->name }}">
                                </a>
                            </div>
                            <div class="pl-10 pr-10">
                                <h5 class="post-title mb-15">
                                    <a href="{{ $author->getPath() }}">
                                        {{ \Illuminate\Support\Str::limit($author->name,70) }}
                                    </a>
                                </h5>
{{--                                <p class="post-exerpt font-medium text-muted mb-30">--}}
{{--                                    {{ \Illuminate\Support\Str::limit($author->body) }}--}}
{{--                                </p>--}}
                                <div class="entry-meta meta-1 font-x-small color-grey
                                                     float-right text-uppercase mb-10">
                                                        <span class="post-by">
                                                            <p>{{ $author->email }}</p>
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
        {{ $authors->links() }}
    </div>
</div>
@endsection
