<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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

    public function show($id, Comment $comments, User $user)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
            'user' => $user,
        ]);
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
