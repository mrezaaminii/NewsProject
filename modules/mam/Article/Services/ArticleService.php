<?php

namespace mam\Article\Services;

use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function nameImage($image): array
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $imagePath = Storage::disk('public')->putFileAs('images',$image,$imageName);
        return [$imageName,$imagePath];
    }
}
