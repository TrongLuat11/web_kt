<?php

use Illuminate\Support\Facades\Route;
Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'byGenre']);
Route::get('/view/{id}', [App\Http\Controllers\MovieController::class, 'view']);
Route::post('/timkiem', [App\Http\Controllers\MovieController::class, 'search']);
Route::get('/admin', [App\Http\Controllers\MovieController::class, 'admin']);
Route::get('/admin/create', [App\Http\Controllers\MovieController::class, 'create']);
Route::post('/admin/store', [App\Http\Controllers\MovieController::class, 'store']);
Route::get('/delete/{id}', [App\Http\Controllers\MovieController::class, 'delete']);
