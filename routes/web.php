<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoriesController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('categories',CategoriesController::class);