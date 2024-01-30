<?php

namespace mam\Category\Contract;

use mam\Category\Model\Category;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function storeCategory(array $data);
    public function showCategory(int $id);
    public function updateCategory(int $id,array $data);
    public function deleteCategory(int $id);
    public function changeCategoryStatus(int $id);
}
