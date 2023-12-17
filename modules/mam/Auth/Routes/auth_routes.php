<?php

use Illuminate\Support\Facades\Route;
use mam\Auth\Http\Controllers\RegisterController;

Route::group([],function (){
    Route::get('register',[RegisterController::class,'view'])->name('auth.register');
    Route::post('register',[RegisterController::class,'register'])->name('auth.register.store');
});
