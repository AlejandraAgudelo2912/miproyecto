<?php

use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageHomeController::class,'index'])->name('page-home.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
