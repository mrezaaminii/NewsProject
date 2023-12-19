<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function view()
    {
        return view('Auth::email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return to_route('home.index');
    }
}
