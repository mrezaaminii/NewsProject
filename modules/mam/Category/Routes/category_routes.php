<?php

use Illuminate\Support\Facades\Route;
use mam\Category\Http\Controllers\CategoryController;
use mam\Category\Http\Controllers\Home\CategoryController as HomeCategoryController;

Route::group(['prefix' => 'admin',['middleware' => 'auth']],function (){
    Route::resource('/categories',CategoryController::class);
    Route::get('/change-status/{id}',[CategoryController::class,'changeStatus'])->name('categories.change.status');
});

Route::group([],function (){
    Route::get('/category/{slug}/details',[HomeCategoryController::class,'details'])->name('category.details');
});
