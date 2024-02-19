<?php

namespace mam\Advertising\Repositories;

use mam\Advertising\Contract\AdvertisingRepositoryInterface;
use mam\Advertising\Http\Requests\AdvertisingRequest;
use mam\Home\Repositories\BaseRepository;

class AdvertisingRepository extends BaseRepository implements AdvertisingRepositoryInterface
{

    public function getAllAdvertisements()
    {
        //
    }

    public function storeAdvertisement(AdvertisingRequest $request)
    {
        //
    }

    public function updateAdvertisement(AdvertisingRequest $request, int $id)
    {
        //
    }

    public function deleteAdvertisement(int $id)
    {
        //
    }
}
