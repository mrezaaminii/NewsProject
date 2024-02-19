<?php

namespace mam\Advertising\Contract;

use mam\Advertising\Http\Requests\AdvertisingRequest;

interface AdvertisingRepositoryInterface
{
    public function getAllAdvertisements();
    public function storeAdvertisement(AdvertisingRequest $request);
    public function updateAdvertisement(AdvertisingRequest $request,int $id);
    public function deleteAdvertisement(int $id);
}
