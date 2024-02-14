<?php

use Illuminate\Support\Facades\Route;
use mam\Comment\Http\Controllers\Admin\CommentController;
use mam\Comment\Http\Controllers\Home\CommentController as HomeCommentController;

Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){
    Route::get('comments/all',[CommentController::class,'index'])->name('comments.index');
    Route::get('comments/changeStatus/{id}',[CommentController::class,'changeStatus'])->name('comments.change.status');
    Route::delete('comments/delete/{id}',[CommentController::class,'destroy'])->name('comments.destroy');
});

Route::group(['middleware' => 'auth'],function (){
    Route::post('comments/store/comment',[HomeCommentController::class,'store'])->name('comments.store');
});
