<?php

use Illuminate\Support\Facades\Route;
use mam\Home\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'index'])->name('home.index');
