<?php

namespace mam\Panel\Http\Controllers;

use App\Http\Controllers\Controller;
use mam\Panel\Models\Panel;

class PanelController extends Controller
{
    public function index()
    {
        return view('Panel::index');
    }
}
