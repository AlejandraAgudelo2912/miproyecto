<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageHomeController::class,'index'])->name('page-home.index');

Route::resource('posts', PostController::class);

Route::get('/posts/{post}/comments/{comment:slug}', [CommentController::class, 'show'])->name('posts.comments.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/my-posts', [PostController::class, 'myPosts'])->name('posts.my');

    Route::resource('posts.comments', CommentController::class)->except(['show']);

});
