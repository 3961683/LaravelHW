<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('form', [HomeController::class, 'form'])
    ->name('form');

Route::post('form', [HomeController::class, 'handle'])
    ->name('form.handle');
