<?php

use Illuminate\Support\Facades\Route;
use mam\Auth\Http\Controllers\LoginController;
use mam\Auth\Http\Controllers\LogoutController;
use mam\Auth\Http\Controllers\RegisterController;
use mam\Auth\Http\Controllers\ResetController;
use mam\Share\Http\Controllers\VerifyController;

Route::group([],function (){
    Route::get('register',[RegisterController::class,'view'])->name('auth.register');
    Route::post('register',[RegisterController::class,'register'])->name('auth.register.store');

    Route::get('login',[LoginController::class,'view'])->name('login');
    Route::post('login',[LoginController::class,'login'])->name('auth.login.store');

    Route::get('verify/email',[VerifyController::class,'view'])->name('auth.verify.email')->middleware('auth');
    Route::get('verify/email/{id}/{hash}',[VerifyController::class,'verify'])->name('verification.verify')->middleware(['auth','signed']);
    Route::post('verify/email/resend',[VerifyController::class,'resend'])->name('verify.resend')->middleware(['auth','throttle:5,1']);

    Route::get('password/email',[ResetController::class,'view'])->name('auth.password.email')->middleware('guest');
    Route::post('password/send-email',[ResetController::class,'sendEmail'])->name('auth.password.send.email')->middleware('guest');
    Route::get('password/send-email-reset',[ResetController::class,'reset'])->name('password.reset')->middleware('guest');
    Route::post('password/send-email-reset-password',[ResetController::class,'resetPassword'])->name('password.update')->middleware('guest');

    Route::get('/logout',LogoutController::class)->name('auth.logout')->middleware('auth');
});
