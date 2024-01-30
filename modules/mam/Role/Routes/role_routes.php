<?php

use Illuminate\Support\Facades\Route;
use mam\Role\Http\Controllers\RoleController;

Route::group(['prefix' => 'admin','middleware'=> 'auth'],function (){
    Route::resource('roles',RoleController::class,['except' => 'show']);
});
