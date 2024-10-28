<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\HomeController;


Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('/home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('authors', AuthorController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('publishers', PublisherController::class);
    Route::resource('books', BookController::class);

});

require __DIR__.'/auth.php';
