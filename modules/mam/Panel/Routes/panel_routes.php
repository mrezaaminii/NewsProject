<?php

use Illuminate\Support\Facades\Route;
use mam\Panel\Http\Controllers\PanelController;

Route::group(['prefix' => 'admin'],function (){
    Route::get('panel',[PanelController::class,'index'])->name('admin.panel');
});
