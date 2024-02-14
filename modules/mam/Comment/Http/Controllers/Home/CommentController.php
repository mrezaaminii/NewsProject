<?php

namespace mam\Comment\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use mam\Comment\Http\Requests\CommentRequest;
use mam\Comment\Models\Comment;
use mam\Comment\Services\CommentService;

class CommentController extends Controller
{
    public function store(CommentRequest $request,CommentService $commentService)
    {
        $commentData = $commentService->storeComment($request);
        $commentService->alertStoringMessage('ذخیره سازی کامنت');
        Comment::create($commentData);
        return back();
    }
}
