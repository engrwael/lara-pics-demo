<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;



Route::resource('/', ImageController::class);
Route::get('/show/{slug}', [ImageController::class, 'show'])->name('image.show');
Route::get('/create', [ImageController::class, 'create'])->name('image.create');
Route::post('/store', [ImageController::class, 'store'])->name('image.store');
Route::get('/{slug}/edit', [ImageController::class, 'edit'])->name('image.edit');
Route::put('/update', [ImageController::class, 'update'])->name('image.update');
Route::get('/delete/{image}', [ImageController::class, 'destroy'])->name('image.delete');