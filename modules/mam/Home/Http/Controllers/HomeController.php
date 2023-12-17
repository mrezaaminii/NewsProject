<?php

namespace mam\Home\Http\Controllers;

class HomeController
{
    public function index() {
        return view('Home::index');
    }
}
