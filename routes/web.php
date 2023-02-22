<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard/')->group(function(){
   Route::get('/',function(){
     // echo("hello from dashboard");
    echo("hello");
   });

   Route::get('/user',function(){
       echo("Leo");
   });
   
});
