<?php

namespace mam\Category\Services;

class CategoryService
{
    public function makeSlug($title): array|string|null
    {
        $urlSlug = str_replace('_','',$title);
        return preg_replace('/\s/','-',$urlSlug);
    }

    public function filterCategorySentDataRequest(array $data): array
    {
        $data['slug'] = $this->makeSlug($data['title']);
        $data['user_id'] = auth()->id();
        return $data;
    }

    public function changeCategoryStatusService($category)
    {
        if ($category->status === 'active'){
            $category->status = 'inactive';
        }else{
            $category->status = 'active';
        }
        $category->save();
        return response()->json(['status' => $category->status]);
    }
}
