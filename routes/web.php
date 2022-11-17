<?php

use App\Http\Controllers\CommentController;

use Illuminate\Support\Facades\Route;

Route::controller('App\Http\Controllers\ProfileController')->group(function () {
    Route::get('/profile/{user}', 'show')->name('profile.show');

    Route::get('/profile/new/{user}', 'create')
        ->middleware('auth')
        ->name('profile.create');

    Route::post('/profile-store', 'store')
        ->middleware('auth')
        ->name('profile.store');

    Route::get('/profile/{profile}/edit', 'edit')
        ->middleware('auth')
        ->name('profile.edit');

    Route::put('/profile/{profile}', 'update')
        ->middleware('auth')
        ->name('profile.update');

    Route::delete('/{user}/delete', 'destroy')
        ->middleware('auth')
        ->name('profile.destroy');
});

Route::controller('App\Http\Controllers\PostController')->group(function () {
    Route::get('/', 'index')->name('posts.index');

    Route::get('/p/new', 'create')
        ->middleware('auth')
        ->name('post.create');

    Route::post('/post-store', 'store')
        ->middleware('auth')
        ->name('post.store');

    Route::get('/p/{post}/edit', 'edit')
        ->middleware('auth')
        ->name('post.edit');

    Route::put('/update/{post}', 'update')
        ->middleware('auth')
        ->name('post.update');

    Route::delete('/p/{post}/delete', 'destroy')
        ->middleware('auth')
        ->name('post.destroy');

    Route::get('/p/{id}', 'show')->name('post.show');
});

Route::middleware('auth')->group(function () {
    Route::post('like', 'App\Http\Controllers\LikeController@like')->name('like');
    Route::delete('like', 'App\Http\Controllers\LikeController@unlike')->name('unlike');
});

Route::post('/p/{post}/comment-store', [CommentController::class, 'store'])
        ->middleware('auth')
        ->name('comment.store');

require __DIR__.'/auth.php';
