<?php

namespace mam\Home\Http\Controllers;

use mam\Advertising\Models\Advertising;
use mam\Advertising\Repositories\AdvertisingRepository;
use mam\Home\Repositories\HomeRepository;

class HomeController
{
    public function index(HomeRepository $homeRepository,AdvertisingRepository $advertisingRepository) {
        $advs_top = $advertisingRepository->getAdvsByLocation(Advertising::LOCATION_TOP_MAIN_PAGE)->latest()->first();
        $advs_bottom = $advertisingRepository->getAdvsByLocation(Advertising::LOCATION_BOTTOM_MAIN_PAGE)->latest()->first();
        return view('Home::index',compact('homeRepository','advs_top','advs_bottom'));
    }
}
