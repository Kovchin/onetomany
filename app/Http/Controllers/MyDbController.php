<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class MyDbController extends Controller
{
    public function createPost($id, $title, $body)
    {
        $user = User::findOrFail($id);

        $post = new Post(['title' => $title, 'body' => $body]);

        $user->posts()->save($post);

        return $user->posts;
    }

    public function showUsers()
    {
        $users = User::all();

        return $users;
    }

    public function showPosts($id)
    {
        $user = User::findOrFail($id);

        $posts = $user->posts;

        dd($posts);
    }

    public function showPostUserName($id)
    {
        $post = Post::findOrFail($id);

        $user = $post->userReverse();

        //TODO разобраться  с обратным вызовом

        dd($user);
    }

    public function updatePost($userId, $postId, $newTitle, $newBody)
//    public function updatePost($userId)
    {
        $user = User::findOrFail($userId);

        $user->posts()->whereId($postId)->update(['title'=>$newTitle, 'body'=>$newBody]);

        $posts = $user->posts;

        return $posts;
    }

    public function deletePost($userId,$postId){

        $user = User::findOrFail($userId);

        $posts = $user->posts()->where('id', '=', $postId)->delete();

        return $posts;

    }
}
