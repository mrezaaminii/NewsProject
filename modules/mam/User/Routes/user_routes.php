<?php

use Illuminate\Support\Facades\Route;
use mam\User\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){
    Route::get('/users/{userId}/role',[UserController::class,'addRoleView'])->name('users.role.view');
    Route::post('/users/{userId}/assignRole',[UserController::class,'assignRoleMethod'])->name('users.role.store');
    Route::delete('/users/{userId}/deleteRole/{roleId}',[UserController::class,'deleteAssignedRole'])->name('users.role.remove');
    Route::resource('users',UserController::class);
});

Route::group(['prefix' => 'home'],function (){
    Route::get('/authors/',[UserController::class,'addRoleView'])->name('home.authors');
    Route::get('/users/{userId}/role',[UserController::class,'addRoleView'])->name('users.role.view');
});
