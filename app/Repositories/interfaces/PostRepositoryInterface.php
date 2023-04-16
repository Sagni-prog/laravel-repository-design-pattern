<?php

namespace App\Repositories\Interfaces;

Interface PostRepositoryInterface{

    public function getAllPosts();
    public function storePost($data);
    public function findPost($id);
    public function updatePost($id,$data);
    public function destroyPost($id);
}