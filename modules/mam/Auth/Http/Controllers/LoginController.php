<?php

namespace mam\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use mam\Auth\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function view(): \Illuminate\Contracts\View\View
    {
        return view('Auth::login');
    }

    public function login(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')])){
            return to_route('home.index');
        }
            return back()->withErrors(['loginError' => __('Login Details Wasn\'t true')]);
    }
}
