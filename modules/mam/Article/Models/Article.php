<?php

namespace mam\Article\Models;

use App\Helper\Helper;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mam\Article\traits\ArticleRelationsTrait;
use Overtrue\LaravelLike\Traits\Likeable;

class Article extends Model implements Viewable
{
    use HasFactory, SoftDeletes,InteractsWithViews,Likeable,ArticleRelationsTrait;

    protected $fillable = ['title','user_id','category_id','time_to_read','slug','keywords','description','imageName','imagePath','score','status','type','body'];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_PENDING = 'pending';
    public const STATUS_INACTIVE = 'inactive';

    public static array $statuses = [
        self::STATUS_ACTIVE,
        self::STATUS_PENDING,
        self::STATUS_INACTIVE
    ];

    public const TYPE_VIP = 'vip';
    public const TYPE_NORMAL = 'normal';

    public static array $types = [
        self::TYPE_VIP,
        self::TYPE_NORMAL
    ];

    public function setTimeToReadAttribute($value)
    {
        $this->attributes['time_to_read'] = Helper::convertPersianToEnglish($value);
    }

    public function getPath(): string
    {
        return route('articles.home.details',$this->slug);
    }
}
