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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $postData = request()->validate([
            'caption' => 'required',
            'image' => 'required'
        ]);

        $postData['image'] = $request->file('image')->store('images', 'public');

        $postData['user_id'] = auth()->id();

        Post::create($postData);

        return redirect('/')->with('message', 'Your post has been created!');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post)
    {
        abort_unless($post->user_id === auth()->id(), 403);

        return view('posts.edit',[
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $postData = request()->validate([
            'caption' => 'nullable',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $postData['image'] = $request->file('image')->store('images', 'public');
        }

        $post->update($postData);

        return redirect(route('post.show', $post->id))->with('message', 'Your post has been updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/')->with('message', 'Your post has been deleted!');
    }
}
