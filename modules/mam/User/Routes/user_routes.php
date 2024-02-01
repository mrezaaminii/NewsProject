<?php

use Illuminate\Support\Facades\Route;
use mam\User\Http\Controllers\UserController;

Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){
    Route::get('/users/{userId}/role',[UserController::class,'addRoleView'])->name('users.role.view');
    Route::post('/users/{userId}/assignRole',[UserController::class,'assignRoleMethod'])->name('users.role.store');
    Route::delete('/users/{userId}/assignRole/{roleId}',
        [UserController::class,'deleteAssignedRole'])->name('users.role.delete');
    Route::resource('users',UserController::class);
});
