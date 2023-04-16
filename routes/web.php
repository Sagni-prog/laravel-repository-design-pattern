<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('posts.create');
});

Route::get('post',[PostController::class,'create']);
Route::post('post',[PostController::class,'store']);

