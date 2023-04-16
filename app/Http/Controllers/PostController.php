<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\PostRequest;
use  App\Repositories\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{

 private $postInterface;
 
 public function __construct(PostRepositoryInterface $postInterface){
   
     $this->postInterface = $postInterface;
 }
 
    public function index(){
         
        $data = $this->postInterface->getAllPosts();
       
       echo $data;
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
