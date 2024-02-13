<?php

namespace mam\Article\traits;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use mam\Category\Model\Category;
use mam\Comment\Models\Comment;
use mam\User\Models\User;

trait ArticleRelationsTrait
{
    use HasRelationships;
    public function activeComments()
    {
        return $this->morphMany(Comment::class,'commentable')
            ->where('status',Comment::STATUS_ACTIVE)
            ->whereNull('comment_id')->with('children');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
