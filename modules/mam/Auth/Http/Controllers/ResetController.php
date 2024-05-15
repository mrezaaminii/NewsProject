<?php

namespace mam\Auth\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use mam\Auth\Http\Requests\ResetPasswordRequest;
use mam\Auth\Http\Requests\SendEmailPasswordRecoveryRequest;
use mam\Share\Http\Controllers\Controller;
use mam\User\Models\User;

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

    public function reset(Request $request)
    {
        $token = $request->token;
        return view('Auth::password.reset',compact('token'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $reset = Password::reset($request->only('email','password','password_confirmation','token'),
        function (User $user, string $password){
            $user->forceFill(['password' => Hash::make($password)])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        }
        );

        return $reset == Password::PASSWORD_RESET ? to_route('login')->with(['message' => 'پسورد با موفقیت تغییر کرد']) : back()->withErrors(['error' => 'مشکلی پیش آمده است لطفا دوباره امتحان کنید']);


    }
}
