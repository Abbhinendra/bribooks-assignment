<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
Route::prefix('auth')->group(function () {
    // guest routes
        Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    // protected routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/profile ', [AuthController::class, 'profile'])->name('auth.profile');
    });
});

Route::middleware('auth:api')->prefix('books')->group(function () {
        Route::post('/', [BookController::class, 'addBook'])->name('books.add');
        Route::get('/', [BookController::class, 'getBooks'])->name('books.list');
        Route::get('/{id}', [BookController::class, 'getBookById'])->name('books.detail');
        Route::put('/{id}', [BookController::class, 'updateBook'])->name('books.update');
        Route::delete('/{id}', [BookController::class, 'deleteBook'])->name('books.delete');
});
