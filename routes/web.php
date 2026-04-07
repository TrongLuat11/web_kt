<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController::class, 'theloai']);
Route::get('/view/{id}', [App\Http\Controllers\MovieController::class, 'view']);
Route::get('/timkiem', [App\Http\Controllers\MovieController::class, 'timkiem']);
Route::get('/admin', [App\Http\Controllers\MovieController::class, 'admin']);
Route::get('/admin/create', [App\Http\Controllers\MovieController::class, 'create']);
Route::post('/admin/store', [App\Http\Controllers\MovieController::class, 'store']);
Route::get('/delete/{id}', [App\Http\Controllers\MovieController::class, 'delete']);
