<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Http\Controllers\PostController;


Route::get('/',[PostController::class,'index']);

Route::get('post',[PostController::class,'create']);
Route::post('post',[PostController::class,'store'])->name('post.post');

