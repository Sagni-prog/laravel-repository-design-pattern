<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{

 private $postInterface;
 
 public function __construct(PostRepositoryInterface $postInterface){
   
     $this->postInterface = $postInterface;
 }
 
    public function index(){
         
        $data = $this->postInterface->getAllPosts();
       
       echo $data['post_title'];
    }
    
    public function show(){
    
    }
    
    public function create(){
       
       return view('posts.create');
    }
    
    public function store(PostRequest $request){
      try {
        
          $data = $request->validated();
          $posts = $this->postInterface->storePost($data);
          
      } catch (\Exception $exception) {
      
         return redirect('resource-not-found',compact($exception->getMessage()));
         
      }
    }
    
    public function edit($id){
    
    }
    
    public function update(PostRequest $request){
    
       $data = $request->validated();
    }
    
    public function destroy(){
    
    }
}
