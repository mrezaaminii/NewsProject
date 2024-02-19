<?php

namespace mam\Advertising\Repositories;

use mam\Advertising\Contract\AdvertisingRepositoryInterface;
use mam\Advertising\Http\Requests\AdvertisingRequest;
use mam\Advertising\Models\Advertising;
use mam\Advertising\Services\AdvertisingService;
use mam\Home\Repositories\BaseRepository;

class AdvertisingRepository extends BaseRepository implements AdvertisingRepositoryInterface
{
    public function __construct(Advertising $advertising)
    {
        parent::__construct($advertising);
    }

    public function getAllAdvertisements()
    {
        return $this->getAll();
    }

    public function storeAdvertisement(array $data)
    {
        return $this->storeRecord($data);
    }

    public function updateAdvertisement(array $data, int $id)
    {
        return $this->updateRecord($id,$data);
    }

    public function deleteAdvertisement(int $id)
    {
        return $this->deleteRecord($id);
    }
}
