<?php

use Illuminate\Support\Facades\Route;
use mam\Panel\Http\Controllers\PanelController;

Route::group(['prefix' => 'admin'],function (){
    Route::get('panel',[PanelController::class,'index'])->name('panel.index');
//    Route::get('panel',['uses' => [PanelController::class,'index'],'as' => 'panel.index'])->name('panel.index');
//    Route::get('panel',['uses' => 'PanelController@index','as' => 'panel.index'])->name('panel.index');
});
