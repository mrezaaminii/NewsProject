<?php

namespace mam\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use mam\Auth\Http\Requests\SendEmailPasswordRecoveryRequest;

class ResetController extends Controller
{
    public function view()
    {
        return view("Auth::password.send-email");
    }

    public function sendEmail(SendEmailPasswordRecoveryRequest $request)
    {
        $reset = Password::sendResetLink($request->only('email'));
        return $reset === Password::RESET_LINK_SENT ? back()->with(['message' => 'لینک بازیابی با موفقیت به ایمیل شما ارسال شد']): back()->withErrors(['error' => 'یک مشکلی در سیستم به وجود امده لطفا دوباره تلاش کنید']);
    }
}
