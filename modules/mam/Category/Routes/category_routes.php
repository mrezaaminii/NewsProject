<?php

use Illuminate\Support\Facades\Route;
use mam\Category\Http\Controllers\CategoryController;

Route::group(['prefix' => 'admin',['middleware' => 'auth']],function (){
    Route::resource('/categories',CategoryController::class);
    Route::get('/change-status/{id}',[CategoryController::class,'changeStatus'])->name('categories.change.status');
});
