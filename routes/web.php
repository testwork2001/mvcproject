<?php

use Src\Http\Routes\Route;
use App\Http\Controllers\HomeController;

Route::get('product/edit/{id}' , [HomeController::class , 'index']);
Route::post('store' , [HomeController::class , 'store']);

//https://localhost:8000/product/87/edit not found
//https://localhost:8000/product/edit/87 success