<?php

use Illuminate\Support\Facades\Route;
use mam\User\Http\Controllers\Admin\UserController;
use mam\User\Http\Controllers\Home\UserController as HomeUserController;

Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){
    Route::get('/users/{userId}/role',[UserController::class,'addRoleView'])->name('users.role.view');
    Route::post('/users/{userId}/assignRole',[UserController::class,'assignRoleMethod'])->name('users.role.store');
    Route::delete('/users/{userId}/deleteRole/{roleId}',[UserController::class,'deleteAssignedRole'])->name('users.role.remove');
    Route::resource('users',UserController::class);
});

Route::group(['prefix' => 'home'],function (){
    Route::get('/authors/',[HomeUserController::class,'index'])->name('home.authors');
    Route::get('/users/{id}/',[HomeUserController::class,'show'])->name('home.author.details');
    Route::get('/user/profile',[UserController::class,'profile'])->name('user.profile')->middleware('auth');
    Route::put('/user/profile',[UserController::class,'updateProfile'])->name('user.profile.update')->middleware('auth');
});
