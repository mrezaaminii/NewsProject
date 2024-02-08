<?php

namespace mam\Comment\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use mam\Comment\Repositories\CommentRepository;

class CommentController extends Controller
{
    protected $repository;
    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $comments = $this->repository->getAllComments()->paginate(15);
        return view('Comment::Admin.index',compact('comments'));
    }

    public function destroy(int $id)
    {
        $this->repository->deleteComment($id);
        alert()->success('حذف کامنت','کامنت با موفقیت حذف شد');
        return to_route('comments.index');
    }

    public function changeStatus(int $id)
    {
        return $this->repository->changeCommentStatus($id);
    }
}
