<?php

namespace mam\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use mam\Article\Models\Article;
use mam\Category\Model\Category;
use mam\Comment\Models\Comment;
use Overtrue\LaravelLike\Traits\Liker;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes,HasRoles,Liker;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public static array $statuses = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE
    ];

    public function cssStatusEmailVerifiedAt(): string
    {
        return $this->hasVerifiedEmail() ? 'success' : 'danger';
    }

    public function textStatusEmailVerifiedAt(): string
    {
        return $this->hasVerifiedEmail() ? 'تایید شده' : 'تایید نشده';
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getPath()
    {
//        return route('user.details',$this->id);
    }

    public function getAuthorPath()
    {
        return route('home.author.details',$this->id);
    }

    public function getImage()
    {
        return asset('assets/imgs/authors/author-14.png');
    }
}
