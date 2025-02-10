<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EonetController;
use App\Http\Controllers\NasaController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageHomeController::class,'index'])->name('page-home.index');

Route::resource('posts', PostController::class);
Route::get('/nasa/picture', [NasaController::class, 'showPicture'])->name('nasa.picture');
Route::get('/nasa/asteroids', [NasaController::class, 'showAsteroids'])->name('nasa.asteroids');
Route::get('/events', [EonetController::class, 'index'])->name('eonet.index');
Route::get('/events/{id}', [EonetController::class, 'show'])->name('eonet.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/my-posts', [PostController::class, 'myPosts'])->name('posts.my');

    Route::get('posts/{post}/comments/{comment}/reply', [CommentController::class, 'replied'])
        ->name('posts.comments.replied');

    Route::post('posts/{post}/comments/{comment}/reply', [CommentController::class, 'reply'])
        ->name('posts.comments.reply');

    Route::resource('categories', CategoryController::class);

    Route::resource('posts.comments', CommentController::class);

    Route::resource('tags', TagController::class);

});
