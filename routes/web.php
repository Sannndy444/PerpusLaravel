<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('Home');
});

Route::resource('authors', AuthorController::class);

Route::resource('categories', CategoryController::class);
