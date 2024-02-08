<?php

namespace mam\Comment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mam\User\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment_id', 'body', 'status', 'commentable_id', 'commentable_type'];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_NEW = 'new';
    public const STATUS_INACTIVE = 'inactive';

    public static array $statuses = [
        self::STATUS_ACTIVE,
        self::STATUS_NEW,
        self::STATUS_INACTIVE
    ];

    public function commentable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(__CLASS__,'comment_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(__CLASS__,'comment_id');
    }
}
