<?php

namespace mam\Category\Repositories;

use Illuminate\Database\Eloquent\Model;
use mam\Category\Contract\CategoryRepositoryInterface;
use mam\Category\Model\Category;
use mam\Category\Services\CategoryService;
use mam\Home\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category,private readonly CategoryService $categoryService)
    {
        parent::__construct($category);
    }

    public function getAllCategories()
    {
        return $this->getAll()->paginate(10);
    }

//    public function storeCategory(array $data)
//    {
//        return $this->categoryService->filterCatgorySentDataRequest($data);
//    }

    public function showCategory(int $id)
    {
        return $this->findById($id);
    }

//    public function updateCategory(int $id, array $data)
//    {
//        $returnedData = $this->categoryService->filterCatgorySentDataRequest($data);
//        return $this->updateRecord($id,$returnedData);
//    }

    public function deleteCategory(int $id)
    {
        return $this->deleteRecord($id);
    }
}
