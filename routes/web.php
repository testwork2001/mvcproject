<?php

use Src\Http\Routes\Route;
use App\Http\Controllers\HomeController;

Route::get('product/edit' , [HomeController::class , 'index']);
Route::post('store' , [HomeController::class , 'store']);