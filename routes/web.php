<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\BrandController;
use \App\Http\Controllers\SizesController;
use \App\Http\Controllers\ColorController;
use \App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::resource('categories',CategoriesController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('sizes',SizesController::class);
    Route::resource('colors',ColorController::class);
    Route::resource('products',ColorController::class);
});
