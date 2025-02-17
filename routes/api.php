<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\User2Controller;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories', CategoryController::class);

Route::apiResource('reviews', ReviewsController::class);

Route::apiResource('users', User2Controller::class);

Route::apiResource('books', BookController::class);

Route::apiResource('loans', LoanController::class);