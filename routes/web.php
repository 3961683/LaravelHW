<?php

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::resource('posts', PostController::class);

Route::resource('repositories', RepositoryController::class);
