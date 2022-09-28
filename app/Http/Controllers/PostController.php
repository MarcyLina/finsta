<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $posts)
    {
        $posts = Post::latest()->paginate(25);

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
        return view('post.create');
    }

    public function edit(Post $post)
    {
        return view('posts.edit',[
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $postData = request()->validate([
            'caption' => 'required',
            'image' => 'required'
        ]);

        $postData['image'] = $request->file('image')->store('images', 'public');

        $post->update($postData);

        return back()->with('message', 'Your post has been updated!');
    }

    public function store(Request $request)
    {
        $postData = request()->validate([
            'caption' => 'required',
            'image' => 'required'
        ]);

        $postData['image'] = $request->file('image')->store('images', 'public');

        Post::create($postData);

        return redirect('/')->with('message', 'Your post has been added!');
    }
}
