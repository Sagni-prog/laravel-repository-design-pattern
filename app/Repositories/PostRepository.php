<?php
namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface{

  public function getAllPosts(){
     
     return Post::where([
        'isDeleted' => false,
        'deleted_at' => null
     ])->get();
     
  }
  
  public function storePost($data){
     
     return Post::create($data);
     
  }
  
  public function findPost($id){
  
     return Post::where([
            'isDeleted' => false,
            'deleted_at' => null,
            'id' => $id
     ])->first();
     
  }
  
  public function updatePost($id,$data){
     
     return Post::where([
                  'isDeleted' => false,
                  'deleted_at' => null,
                  'id' => $id
                  ])
                    ->update([
                      'post_title' => $data['post_title'],
                      'post_content' => $data['post_content'],
                      'slug' => Str::kebab($data['post_title'])
                  ]);
     }
     
  public function destroyPost($id){
       
       return Post::where([
         'isDeleted' => false,
         'deleted_at' => null,
         'id' => $id
         ])->update([
             'isDeleted' => true,
             'deleted_at' => Carbon::now(),
         ]);
   }   
}

