<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'theloai']);
Route::post('/timkiem', [App\Http\Controllers\MovieController::class, 'timkiem']);
Route::get('/admin/create', [App\Http\Controllers\MovieController::class, 'create']);
Route::post('/admin/store', [App\Http\Controllers\MovieController::class, 'store']);