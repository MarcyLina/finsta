<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller('App\Http\Controllers\PostController')->group(function () {
    Route::get('/post/{id}', 'show')->name('post.show');
    Route::get('/posts', 'index');
});

require __DIR__.'/auth.php';
