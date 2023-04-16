<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('posts/',[PostController::class,'index']);

Route::get('post',[PostController::class,'create'])->name('post.create');
Route::post('post',[PostController::class,'store'])->name('post.post');

Route::get('post/{id}',[PostController::class,'show'])->name('post.show');
Route::get('posts/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('update-post/{id}',[PostController::class,'update'])->name('post.update');
Route::post('post/{id}',[PostController::class,'destroy'])->name('post.delete');

