<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $posts)
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
}
