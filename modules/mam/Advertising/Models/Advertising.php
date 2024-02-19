<?php

namespace mam\Advertising\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'imageName', 'imagePath', 'link', 'title'];


}
