<?php

namespace mam\Comment\Contract;

interface CommentRepositoryInterface
{
    public function getAllComments();
    public function deleteComment(int $id);
    public function changeCommentStatus(int $id);
}
