<?php

namespace mam\Home\Http\Controllers;

use mam\Home\Repositories\HomeRepository;

class HomeController
{
    public function index(HomeRepository $homeRepository) {
        $advs_top = $homeRepository->getTopAdByLocation();
        return view('Home::index',compact('homeRepository','advs_top'));
    }
}
