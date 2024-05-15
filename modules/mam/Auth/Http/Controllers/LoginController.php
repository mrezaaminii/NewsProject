<?php

namespace mam\Auth\Http\Controllers;

use mam\Auth\Http\Requests\LoginRequest;
use mam\Share\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function view(): \Illuminate\Contracts\View\View
    {
        return view('Auth::login');
    }

    public function login(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (auth()->attempt($request->only('email','password'))){
            return to_route('home.index');
        }
            return back()->withErrors(['loginError' => __('Login Details Wasn\'t true')]);
    }
}
