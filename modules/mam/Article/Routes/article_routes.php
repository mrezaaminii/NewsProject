<?php

use Illuminate\Support\Facades\Route;
use mam\Article\Http\Controllers\ArticleController;

Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){
    Route::resource('articles',ArticleController::class);
    Route::get('/articles/change-status/{id}',[ArticleController::class,'changeStatus'])->name('articles.change.status');
});
