<?php

namespace mam\Advertising\Contract;

use mam\Advertising\Http\Requests\AdvertisingRequest;

interface AdvertisingRepositoryInterface
{
    public function getAllAdvertisements();
    public function storeAdvertisement(array $data);
    public function updateAdvertisement(array $data,int $id);
    public function deleteAdvertisement(int $id);
}
