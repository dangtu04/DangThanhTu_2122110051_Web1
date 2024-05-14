<?php

use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class ,'index']);
Route::get('/san-pham',[ProductController::class ,'index']);
Route::get('/chi-tiet-san-pham/{slug}',[ProductController::class ,'product_detail']);
Route::get('/lien-he',[ContactController::class ,'index']);


