<?php

namespace mam\Home\Http\Controllers;

use mam\Home\Repositories\HomeRepository;

class HomeController
{
    public function index(HomeRepository $homeRepository) {
        return view('Home::index',compact('homeRepository'));
    }
}
