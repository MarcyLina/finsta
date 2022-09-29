<?php

use Illuminate\Support\Facades\Route;

Route::controller('App\Http\Controllers\PostController')->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::get('/p/new', 'create')->middleware('auth')->name('post.create');
    Route::post('/post-store', 'store')->middleware('auth')->name('post.store');
    Route::get('/p/{post}/edit', 'edit')->middleware('auth')->name('post.edit');
    Route::put('/update/{post}', 'update')->middleware('auth')->name('post.update');
    Route::delete('/delete/{post}', 'destroy')->middleware('auth')->name('post.destroy');
    Route::get('/p/{id}', 'show')->name('post.show');
});

require __DIR__.'/auth.php';
