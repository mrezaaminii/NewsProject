<?php

namespace mam\Category\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mam\User\Models\User;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','description','slug','keyword','status','user_id','parent_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function parentCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(__CLASS__,'parent_id');
    }

    public function subCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(__CLASS__,'parent_id');
    }

    protected const ACTIVE = 'active';

    protected const INACTIVE = 'inactive';

    public static array $statuses = [self::ACTIVE,self::INACTIVE];


}