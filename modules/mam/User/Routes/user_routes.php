<?php

use Illuminate\Support\Facades\Route;
use mam\User\Http\Controllers\UserController;

Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){
    Route::resource('users',UserController::class);
});
