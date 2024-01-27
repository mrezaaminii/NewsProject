<?php

namespace mam\Home\Repositories;

use Illuminate\Database\Eloquent\Model;
use mam\Home\Contract\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all();
    }
    public function store(array $data): Model|\Illuminate\Database\Eloquent\Builder
    {
        return $this->model->query()->create($data);
    }

    public function findById(int $id): Model|\Illuminate\Database\Eloquent\Collection
    {
        return $this->model->query()->find($id);
    }

    public function update(int $id, array $data): Model|\Illuminate\Database\Eloquent\Collection
    {
        $record = $this->findById($id);
        $record->update($data);
        return $record;
    }

    public function delete(int $id): ?bool
    {
        return $this->model->delete($id);
    }
}
