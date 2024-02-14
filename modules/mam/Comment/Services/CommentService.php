<?php

namespace mam\Comment\Services;

use JetBrains\PhpStorm\ArrayShape;
use mam\Role\Models\Permission;

class CommentService
{
    #[ArrayShape([
        'user_id' => 'int',
        'comment_id' => 'int',
        'body' => 'string',
        'status' => 'string',
        'commentable_id' => 'int',
        'commentable_type' => 'int'
    ])]
    public function storeComment($request): array
    {
        return [
            'user_id' => auth()->id(),
            'comment_id' => $request->comment_id,
            'body' => $request->body,
            'status' => $this->setStatus(),
            'commentable_id' => $request->commentable_id,
            'commentable_type' => $request->commentable_type,
        ];
    }

    public function setStatus(): string
    {
        if (auth()->user()->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN)) {
            return 'active';
        }
        return 'new';
    }
}
