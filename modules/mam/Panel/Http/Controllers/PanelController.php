<?php

namespace mam\Panel\Http\Controllers;

use mam\Panel\Models\Panel;
use mam\Panel\Repositories\PanelRepository;
use mam\Share\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index(PanelRepository $panelRepo)
    {
        $this->authorize('index',Panel::class);
        return view('Panel::index',compact('panelRepo'));
    }
}
