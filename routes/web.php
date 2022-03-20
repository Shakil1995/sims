<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\StoreController;
use \App\Http\Controllers\BrandController;
use \App\Http\Controllers\ColorController;
use \App\Http\Controllers\SizesController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CategoriesController;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/', function () { return view('dashboard');});
    
    Route::resource('categories',CategoriesController::class);
    Route::resource('stores',StoreController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('sizes',SizesController::class);
    Route::resource('colors',ColorController::class);
    Route::resource('products',ProductController::class);
    Route::resource('sells',SellController::class);
});
