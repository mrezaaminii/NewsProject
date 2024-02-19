<?php

use Illuminate\Support\Facades\Route;
use mam\Advertising\Http\Controllers\AdvertisingController;

Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){
    Route::resource('advertising',AdvertisingController::class);
});
