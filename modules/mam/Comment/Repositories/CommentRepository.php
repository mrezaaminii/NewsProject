<?php

namespace mam\Comment\Repositories;

use mam\Comment\Contract\CommentRepositoryInterface;
use mam\Comment\Models\Comment;
use mam\Home\Repositories\BaseRepository;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
    }

    public function getAllComments()
    {
        return $this->getAll();
    }

    public function deleteComment(int $id)
    {
        return $this->findById($id)->delete();
    }

    public function changeCommentStatus(int $id)
    {
        $comment = $this->findById($id);
        $status = match ($comment->status) {
            'active' => $comment->status = 'inactive',
            'inactive' => $comment->status = 'active',
            default => false
        };

        return response()->json(['status' => $status]);
    }
}
