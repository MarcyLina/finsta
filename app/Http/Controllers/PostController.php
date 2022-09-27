<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Post $posts)
    {
        $posts = Post::latest()->paginate(10);

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

    public function store()
    {
        $postData = request()->validate([
            'caption' => 'required',
            'image' => 'required'
        ]);

        Post::create($postData);

        return redirect('/')->with('message', 'Your post has been added!');
    }
}
