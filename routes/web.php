<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);
Route::get('/theloai/{id}', [MovieController::class, 'byGenre']);
Route::get('/phim/{id}', [MovieController::class, 'show']);
Route::post('/timkiem', [MovieController::class, 'search']);