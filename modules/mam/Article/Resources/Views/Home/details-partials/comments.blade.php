<div class="comments-area">
    <h3 class="mb-30">{{ $article->activeComments()->count() }} نظرات</h3>
    @foreach($article->activeComments() as $comment)
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img src="{{ $comment->user?->getImage() }}" alt="user image">
                </div>
                <div class="desc">
                    <p class="comment">
                        {{ $comment->body }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <h5>
                                <a href="{{ $comment->user->getPath() }}">{{ $comment->user?->name }}</a>
                            </h5>
                            <p class="date">{{ jdate($comment->created_at)->format('%A, %d %B %y') }}</p>
                        </div>
                        <div class="reply-btn">
                            <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       @foreach($comment->children as $answeredComment)
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="{{ $answeredComment->user?->getImage() }}" alt="user image">
                        </div>
                        <div class="desc">
                            <p class="comment">
                                {{ $answeredComment->body }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        <a href="{{ $answeredComment->user->getPath() }}">{{ $answeredComment->user?->name }}</a>
                                    </h5>
                                    <p class="date">{{ jdate($answeredComment->created_at)->format('%A, %d %B %y') }}</p>
                                </div>
                                <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       @endforeach
    @endforeach
</div>
