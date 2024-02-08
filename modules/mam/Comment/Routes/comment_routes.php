<?php

use Illuminate\Support\Facades\Route;
use mam\Comment\Http\Controllers\CommentController;

Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){
    Route::get('comments/all',[CommentController::class,'index'])->name('comments.index');
    Route::put('comments/update/{id}',[CommentController::class,'update'])->name('comments.update');
    Route::delete('comments/delete/{id}',[CommentController::class,'destroy'])->name('comments.destroy');
});
