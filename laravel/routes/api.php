<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v1', [ExampleController::class, 'index'])->name('index');
Route::post('/v1', [ExampleController::class, 'store'])->name('store');
Route::get('/v1/{user_id}', [ExampleController::class, 'show'])->name('show');