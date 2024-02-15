<div class="col-lg-8 col-md-12">
    <div class="latest-post mb-50">
        <div class="loop-grid">
            <div class="row">
                @foreach($articles as $article)
                    <article class="col-lg-6 col-md-12 wow fadeIn animated">
                        <div class="background-white border-radius-10 p-10 mb-30">
                            <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                <a href="{{ $article->getPath() }}">
                                    <img class="border-radius-15 article-img-style"
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
        {{ $articles->links() }}
    </div>
</div>
