<?php
namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface{

  public function getAllPosts(){
     
     return Post::all();
     
  }
  
  public function storePost($data){
     
     return Post::create($data);
     
  }
  
  public function findPost($id){
  
     return Post::find($id);
     
  }
  
  public function updatePost($id,$data){
     
     return Post::find($id)
                  ->update([
                      'post_title' => $data['post_title'],
                      'post_content' => $data['post_content'],
                      'slug' => Str::kebab($data('post_title'))
                  ]);
     }
     
  public function destroyPost($id){
       
       return Post::where([
           'id' => $id,
           'isDeleted' => false,
           'deteted_at' => null
       ])->update([
           'isDeleted' => true,
           'deleted_at' => Carbon::now()
       ]);
   }   
}

