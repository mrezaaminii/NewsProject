<?php

use App\Http\Controllers\VerifyController;
use mam\Auth\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use mam\Auth\Http\Controllers\RegisterController;

Route::group([],function (){
    Route::get('register',[RegisterController::class,'view'])->name('auth.register');
    Route::post('register',[RegisterController::class,'register'])->name('auth.register.store');

    Route::get('login',[LoginController::class,'view'])->name('login');
    Route::post('login',[LoginController::class,'login'])->name('auth.login.store');

    Route::get('verify/email',[VerifyController::class,'view'])->name('auth.verify.email')->middleware('auth');
    Route::get('verify/email/{id}/{hash}',[VerifyController::class,'verify'])->name('verification.verify')->middleware(['auth','signed']);
    Route::post('verify/email/resend',[VerifyController::class,'resend'])->name('verify.resend')->middleware(['auth','throttle:5,1']);
});
