<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EonetController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NasaController;
use App\Http\Controllers\ObservationPointController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageHomeController::class,'index'])->name('page-home.index');

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('posts.comments', CommentController::class);
Route::get('/nasa/picture', [NasaController::class, 'showPicture'])->name('nasa.picture');
Route::get('/nasa/asteroids', [NasaController::class, 'showAsteroids'])->name('nasa.asteroids');
Route::get('/events', [EonetController::class, 'index'])->name('eonet.index');
Route::get('/events/{id}', [EonetController::class, 'show'])->name('eonet.show');
Route::get('/map', [ObservationPointController::class, 'index'])->name('map.index');

Route::middleware(['auth', 'role:god'])->group(function () {
    Route::get('/admin/users', [RoleController::class, 'index'])->name('users.index');
    Route::post('/admin/users/assign-role', [RoleController::class, 'assignRole'])->name('users.assignRole');
});

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
    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');
    Route::post('/map/add', [ObservationPointController::class, 'store'])->name('map.store');
});
