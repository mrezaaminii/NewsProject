<?php

namespace mam\Home\Contract;

interface BaseRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function findById(int $id);
    public function update(int $id,array $data);
    public function delete(int $id);
}
