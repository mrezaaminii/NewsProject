<?php

namespace mam\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use mam\Auth\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function view()
    {
        return view('Auth::register');
    }

    public function register(RegisterRequest $request)
    {

    }
}
