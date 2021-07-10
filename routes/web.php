<?php

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('posts/{post}',[PostController::class, 'show'])
    ->name('posts.show');

Route::get('posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::put('posts/{post}',[PostController::class, 'update'])
    ->name('posts.update');

Route::delete('posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.delete');

Route::get('repositories', [RepositoryController::class, 'index'])
    ->name('repositories.index');

Route::get('repositories/create', [RepositoryController::class, 'create'])
    ->name('repositories.create');

Route::post('repositories', [RepositoryController::class, 'store'])
    ->name('repositories.store');

Route::get('repositories/{repository}',[RepositoryController::class, 'show'])
    ->name('repositories.show');

Route::get('repositories/{repository}/edit', [RepositoryController::class, 'edit'])
    ->name('repositories.edit');

Route::put('repositories/{repository}',[RepositoryController::class, 'update'])
    ->name('repositories.update');

Route::delete('repositories/{repository}', [RepositoryController::class, 'destroy'])
    ->name('repositories.delete');
