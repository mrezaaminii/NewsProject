<?php

namespace mam\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use mam\Auth\Http\Requests\RegisterRequest;
use mam\Auth\Services\RegisterService;

class RegisterController extends Controller
{
    public function view()
    {
        return view('Auth::register');
    }

    public function register(RegisterRequest $request,RegisterService $registerService)
    {
        $user = $registerService->generateUser($request);
        auth()->loginUsingId($user->id);
        event(new Registered($user));
        return redirect()->route('home.index');
    }
}
