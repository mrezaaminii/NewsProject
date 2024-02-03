<?php

namespace mam\Article\Services;

use Illuminate\Support\Facades\Storage;
use mam\Article\Http\Requests\ArticleRequest;

class ArticleService
{
    public function nameImage($image): array
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $imagePath = Storage::disk('public')->putFileAs('images',$image,$imageName);
        return [$imageName,$imagePath];
    }

    public function checkIfImageSent(ArticleRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            return $this->nameImage($request->file('image'));
        }

        return false;
    }
}
