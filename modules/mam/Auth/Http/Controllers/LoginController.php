<?php

namespace mam\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use mam\Auth\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function view()
    {
        return view('Auth::login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email,'password' => $request->password])){
            return to_route('home.index');
        }
            return back()->withErrors(['loginError' => __('Login Details Wasn\'t true')]);
    }
}
