<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'homepage']);




Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/post_page', [AdminController::class, 'post_page']);

Route::post('/add_post', [AdminController::class, 'add_post']);

Route::get('/showPosts', [AdminController::class, 'showPosts'])->name('showPosts');


// Edit post (using post id)
Route::get('/editPost/{id}', [AdminController::class, 'editPost'])->name('editPost');

// Update post (using post id)
Route::post('/updatePost/{id}', [AdminController::class, 'updatePost'])->name('updatePost');

// Delete post (using post id)
Route::delete('/deletePost/{id}', [AdminController::class, 'deletePost'])->name('deletePost');


