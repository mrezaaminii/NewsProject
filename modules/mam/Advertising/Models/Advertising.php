<?php

namespace mam\Advertising\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mam\User\Models\User;

class Advertising extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'imageName', 'imagePath', 'link', 'title'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
