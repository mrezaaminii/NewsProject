<?php

use Illuminate\Support\Facades\Route;
use mam\Article\Http\Controllers\Admin\ArticleController as ArticleController;
use mam\Article\Http\Controllers\Home\ArticleController as HomeArticleController;

Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){
    Route::resource('articles',ArticleController::class);
    Route::get('/articles/change-status/{id}',[ArticleController::class,'changeStatus'])->name('articles.change.status');
});

Route::group(['prefix' => 'home'],function (){
    Route::get('/articles/details/{slug}',[HomeArticleController::class,'details'])->name('articles.home.details');
    Route::get('/articles/home/',[HomeArticleController::class,'home'])->name('articles.home');
});
