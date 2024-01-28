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
    public function getAll()
    {
        return $this->model->query()->latest()->paginate(10);
    }
    public function storeRecord(array $data): Model|\Illuminate\Database\Eloquent\Builder
    {
        return $this->model->query()->create($data);
    }

    public function findById(int $id): Model|\Illuminate\Database\Eloquent\Collection
    {
        return $this->model->query()->findOrFail($id);
    }

    public function updateRecord(int $id, array $data): Model|\Illuminate\Database\Eloquent\Collection
    {
        $record = $this->findById($id);
        $record->update($data);
        return $record;
    }

    public function deleteRecord(int $id): ?bool
    {
        $record = $this->findById($id);
        return $record->delete();
    }
}
