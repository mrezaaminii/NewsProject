<?php

namespace mam\Panel\Http\Controllers;

use mam\Panel\Models\Panel;
use mam\Share\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        $this->authorize('index',Panel::class);
        return view('Panel::index');
    }
}
