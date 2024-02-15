<?php

namespace mam\Comment\Services;

use JetBrains\PhpStorm\ArrayShape;
use mam\Comment\Models\Comment;
use mam\Role\Models\Permission;
use mam\Share\Repositories\ShareRepository;

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

    public function alertStoringMessage(string $title)
    {
        if (auth()->user()->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN)) {
            return ShareRepository::alertMessage($title, 'کامنت با موفقیت ذخیره شد');
        }
        return ShareRepository::alertMessage($title, 'کامنت شما پس از بررسی ذخیره خواهد شد');
    }

    public function getLatestComments()
    {
        return Comment::query()->latest()->limit(3)->get();
    }
}
