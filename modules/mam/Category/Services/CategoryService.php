<?php

namespace mam\Category\Services;

use mam\Share\Repositories\ShareRepository;

class CategoryService
{
    public function makeSlug($title): array|string|null
    {
        return ShareRepository::makeSlug($title);
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
