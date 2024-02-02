<?php

use Illuminate\Support\Facades\Route;
use mam\Article\Http\Controllers\ArticleController;

Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){
    Route::resource('article',ArticleController::class);
});
