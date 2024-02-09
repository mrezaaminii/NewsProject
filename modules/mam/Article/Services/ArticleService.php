<?php

namespace mam\Article\Services;

use Illuminate\Support\Facades\Storage;
use mam\Article\Http\Requests\ArticleRequest;
use mam\Article\Models\Article;
use mam\Share\Repositories\ShareRepository;

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

    public function checkIfImageSentWhileUpdating(Article $article,ArticleRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            if ($article->imagePath && $article->imageName){
                Storage::disk('public')->delete($article->imagePath);
                $article->imagePath = null;
                $article->imageName = null;
                return $this->checkIfImageSent($request);
            }else{
                return $this->checkIfImageSent($request);
            }
        }else{
            $imageName = $article->imageName;
            $imagePath = $article->imagePath;
            return [$imageName,$imagePath];
        }

    }

    public function makeSlug($title): array|string|null
    {
        return ShareRepository::makeSlug($title);
    }

    public function changeArticleStatusService($article)
    {
        $status = match ($article->status) {
            'active' => $article->status = 'pending',
            'pending' => $article->status = 'inactive',
            default => $article->status = 'active'
        };
        $article->save();
        return response()->json(['status' => $status]);
    }
}
