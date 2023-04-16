<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{

 private $postInterface;
 
 public function __construct(PostRepositoryInterface $postInterface){
   
     $this->postInterface = $postInterface;
 }
 
    public function index(){
         
         try {      
            $posts = $this->postInterface->getAllPosts();
            return view('posts.app',compact('posts'));
         } catch (\Exception $exception) {
             
         }
   
    }
    
    public function show($id){
       return $id;
    }
    
    public function create(){
       
       return view('posts.create');
    }
    
    public function store(PostRequest $request){
      try {
        
          $data = $request->validated();
          $data['slug'] = Str::kebab($data['post_title']);
          $posts = $this->postInterface->storePost($data);
          
      } catch (\Exception $exception) {
        
         return redirect('resource-not-found',compact($exception->getMessage()));
         
      }
    }
    
    public function edit($id){
         
         try {
         
            $post = $this->postInterface->findPost($id);
            return view('posts.edit-post',compact('post'));
            
         } catch (\Throwable $th) {
            throw $th;
         }
    }
    
    public function update(Request $rq,PostRequest $request,$id){
    
        $data = $request->validated();
        $isUpdated = $this->postInterface->updatePost($id,$data);
         if(!$isUpdated){
            return back()->with('error','Oops! something went wrong please try again');
         }
    }
    
    public function destroy($id){
       $isDeleted = $this->postInterface->destroyPost($id);
       if(!$isDeleted){
       
       }
       
       return back()->with('success','You have successfully deleted the post');
    }
}
