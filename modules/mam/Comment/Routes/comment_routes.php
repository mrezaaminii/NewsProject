<?php

use Illuminate\Support\Facades\Route;
use mam\Comment\Http\Controllers\CommentController;

Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){
    Route::get('comments/all',[CommentController::class,'index'])->name('comments.index');
    Route::get('comments/changeStatus/{id}',[CommentController::class,'changeStatus'])->name('comments.change.status');
    Route::delete('comments/delete/{id}',[CommentController::class,'destroy'])->name('comments.destroy');
});
