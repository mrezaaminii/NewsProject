<?php

namespace mam\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use mam\Share\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __invoke(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return to_route('home.index');
    }
}
