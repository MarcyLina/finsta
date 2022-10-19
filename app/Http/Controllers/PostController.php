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

        $comments = [
            (object)['username' => 'kiki', 'comment' => 'meow meow'],
            (object)['username' => 'lucy', 'comment' => 'woof woof'],
            (object)['username' => 'robocop', 'comment' => 'snort snort'],
            (object)['username' => 'buttMcbutt', 'comment' => 'no one asked me for my uneducated opinion but ima say it anyway because \'merica and freedom and i ain puttin\' a mask on for no one and the goverrmint puttin\' microchips in the vaccines. Sketti and guns!' ],
        ];

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
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
