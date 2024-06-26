<?php

namespace mam\Advertising\Repositories;

use mam\Advertising\Contract\AdvertisingRepositoryInterface;
use mam\Advertising\Http\Requests\AdvertisingRequest;
use mam\Advertising\Models\Advertising;
use mam\Advertising\Services\AdvertisingService;
use mam\Home\Repositories\BaseRepository;

class AdvertisingRepository extends BaseRepository implements AdvertisingRepositoryInterface
{
    public function __construct(Advertising $advertising,readonly private AdvertisingService $service)
    {
        parent::__construct($advertising);
    }

    public function getAllAdvertisements()
    {
        return $this->getAll();
    }

    public function storeAdvertisement(AdvertisingRequest $request)
    {
        $data = $this->service->filterRequest($request);
        return $this->storeRecord($data);
    }

    public function updateAdvertisement(AdvertisingRequest $request, int $id)
    {
        $advertising = $this->findById($id);
        $data = $this->service->filterRequest($request,$advertising);
        return $this->updateRecord($id,$data);
    }

    public function deleteAdvertisement(int $id)
    {
        return $this->deleteRecord($id);
    }

    public function getAdvsByLocation(string $location)
    {
        return Advertising::query()->where('location',$location);
    }
}
