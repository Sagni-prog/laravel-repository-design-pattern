<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Http\Controllers\PayController;


Route::get('/', function () {
    return view('posts.create');
});

