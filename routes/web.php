<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;

Route::get('/', function () {
    return view('Home');
});

Route::resource('authors', AuthorController::class);

Route::resource('categories', CategoryController::class);

Route::resource('publishers', PublisherController::class);
