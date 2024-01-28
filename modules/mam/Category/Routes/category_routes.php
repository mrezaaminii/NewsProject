<?php

use Illuminate\Support\Facades\Route;
use mam\Category\Http\Controllers\CategoryController;

Route::group(['prefix' => 'admin',['middleware' => 'auth']],function (){
    Route::resource('/categories',CategoryController::class);
});
