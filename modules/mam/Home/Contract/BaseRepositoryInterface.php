<?php

namespace mam\Home\Contract;

interface BaseRepositoryInterface
{
    public function getAll();
    public function storeRecord(array $data);
    public function findById(int $id);
    public function findBySlug(string $slug);
    public function updateRecord(int $id,array $data);
    public function deleteRecord(int $id);
}
