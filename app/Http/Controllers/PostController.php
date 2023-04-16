<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\PostRequest;

class PostController extends Controller
{
    public function index(){
    
    }
    
    public function show(){
    
    }
    
    public function create(){
       
       return view('posts.create');
    }
    
    public function store(PostRequest $request){
    
       $data = $request->validated();
    }
    
    public function edit($id){
    
    }
    
    public function update(PostRequest $request){
    
       $data = $request->validated();
    }
    
    public function destroy(){
    
    }
}
