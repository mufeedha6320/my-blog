<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ BlogController::class, 'index'])->name('index');
Route::redirect('/login', '/user-login');
Route::get('user-register', [UserController::class, 'register'])->name('user.register');
Route::post('user-register', [UserController::class, 'register'])->name('do.user.register');
Route::get('user-login', [UserController::class, 'login'])->name('user.login');
Route::post('user-login', [UserController::class, 'authenticate'])->name('user.authenticate');

Route::get('display/{id}', [ BlogController::class, 'display'])->name('display');

Route::middleware('auth')->group(function () {
    Route::post('user-logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('create-blog', [ BlogController::class, 'create'])->name('blog.create');
    Route::post('create-blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('list-blog', [BlogController::class, 'list'])->name('blog.list');
    Route::get('edit-blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('update-blog/{id}', [BlogController::class, 'update'])->name('blog.update');
});

Route::post('review-store/{id}', [ ReviewController::class, 'store'])->name('review.store');

